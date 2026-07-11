<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Participant;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $notifications = Notification::with('participant')
            ->when($search, function ($query) use ($search) {

                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")

                    ->orWhereHas('participant', function ($q) use ($search) {

                        $q->where('participant_name', 'like', "%{$search}%");

                    });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('notifications.index', compact(
            'notifications',
            'search'
        ));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $participants = Participant::all();

        return view('notifications.create', compact('participants'));
    }

    /**
     * Store notification.
     */
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'nullable',
            'title'          => 'required',
            'message'        => 'required',
            'type'           => 'required'
        ]);

        Notification::create([
            'participant_id' => $request->participant_id,
            'title'          => $request->title,
            'message'        => $request->message,
            'type'           => $request->type,
            'status'         => 'Unread'
        ]);

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification created successfully.');
    }

    /**
     * Display notification.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show edit form.
     */
    public function edit(Notification $notification)
    {
        $participants = Participant::all();

        return view('notifications.edit', compact(
            'notification',
            'participants'
        ));
    }

    /**
     * Update notification.
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'participant_id' => 'nullable',
            'title'          => 'required',
            'message'        => 'required',
            'type'           => 'required',
            'status'         => 'required'
        ]);

        $notification->update($request->all());

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification updated successfully.');
    }

    /**
     * Delete notification.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification deleted successfully.');
    }
}