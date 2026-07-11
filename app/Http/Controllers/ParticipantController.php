<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of participants.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $participants = Participant::when($search, function ($query) use ($search) {

                $query->where('participant_name', 'like', "%{$search}%")
                      ->orWhere('ic_passport', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('company', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");

            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('participants.index', compact(
            'participants',
            'search'
        ));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store participant.
     */
    public function store(Request $request)
    {
        $request->validate([

            'participant_name' => 'required|max:255',
            'ic_passport'      => 'required|max:50|unique:participants,ic_passport',
            'email'            => 'required|email|unique:participants,email',
            'phone'            => 'required|max:20',
            'company'          => 'required|max:255',
            'status'           => 'required',

        ]);

        Participant::create($request->all());

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant added successfully.');
    }

    /**
     * Display participant.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show edit form.
     */
    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    /**
     * Update participant.
     */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([

            'participant_name' => 'required|max:255',
            'ic_passport'      => 'required|max:50|unique:participants,ic_passport,' . $participant->id,
            'email'            => 'required|email|unique:participants,email,' . $participant->id,
            'phone'            => 'required|max:20',
            'company'          => 'required|max:255',
            'status'           => 'required',

        ]);

        $participant->update($request->all());

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant updated successfully.');
    }

    /**
     * Delete participant.
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant deleted successfully.');
    }
}