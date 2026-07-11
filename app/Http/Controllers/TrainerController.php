<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of trainers.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $trainers = Trainer::when($search, function ($query) use ($search) {

                $query->where('trainer_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('specialization', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");

            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('trainers.index', compact(
            'trainers',
            'search'
        ));
    }

    /**
     * Show the form for creating a trainer.
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created trainer.
     */
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

    /**
     * Display the specified trainer.
     */
    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the trainer.
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified trainer.
     */
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

    /**
     * Remove the specified trainer.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()
            ->route('trainers.index')
            ->with('success', 'Trainer deleted successfully.');
    }
}