<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'trainer_name'   => 'required|max:255',
            'email'          => 'required|email|unique:trainers,email',
            'phone'          => 'required|max:20',
            'specialization' => 'required|max:255',
            'status'         => 'required',
        ]);

        Trainer::create($request->all());

        return redirect()
            ->route('trainers.index')
            ->with('success', 'Trainer added successfully.');
    }

    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'trainer_name'   => 'required|max:255',
            'email'          => 'required|email|unique:trainers,email,' . $trainer->id,
            'phone'          => 'required|max:20',
            'specialization' => 'required|max:255',
            'status'         => 'required',
        ]);

        $trainer->update($request->all());

        return redirect()
            ->route('trainers.index')
            ->with('success', 'Trainer updated successfully.');
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()
            ->route('trainers.index')
            ->with('success', 'Trainer deleted successfully.');
    }
}