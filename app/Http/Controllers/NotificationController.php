<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Participant;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('participant')->latest()->get();

        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        $participants = Participant::all();

        return view('notifications.create', compact('participants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'nullable',
            'title' => 'required',
            'message' => 'required',
            'type' => 'required'
        ]);

        Notification::create([
            'participant_id' => $request->participant_id,
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type,
            'status' => 'Unread'
        ]);

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification created successfully.');
    }

    public function show(Notification $notification)
    {
        //
    }

    public function edit(Notification $notification)
    {
        $participants = Participant::all();

        return view('notifications.edit', compact(
            'notification',
            'participants'
        ));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'participant_id' => 'nullable',
            'title' => 'required',
            'message' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $notification->update($request->all());

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification updated successfully.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()
            ->route('notifications.index')
            ->with('success', 'Notification deleted successfully.');
    }
}