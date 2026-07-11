<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();

        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        return view('participants.create');
    }

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

    public function show(Participant $participant)
    {
        //
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

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

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant deleted successfully.');
    }
}