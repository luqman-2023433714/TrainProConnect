<?php

namespace App\Http\Controllers;

use App\Models\TrainingClass;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainingClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = TrainingClass::with(['course', 'trainer'])
                    ->orderBy('id', 'desc')
                    ->get();

        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $trainers = Trainer::all();

        return view('classes.create', compact('courses', 'trainers'));
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_code'        => 'required|unique:training_classes',
            'course_id'         => 'required|exists:courses,id',
            'trainer_id'        => 'required|exists:trainers,id',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'venue'             => 'required|max:255',
            'max_participants'  => 'required|integer|min:1',
            'status'            => 'required'
        ]);

        TrainingClass::create($request->all());

        return redirect()
            ->route('classes.index')
            ->with('success', 'Training class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingClass $class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingClass $class)
    {
        $courses = Course::all();
        $trainers = Trainer::all();

        return view('classes.edit', compact(
            'class',
            'courses',
            'trainers'
        ));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, TrainingClass $class)
    {
        $request->validate([
            'class_code'       => 'required|unique:training_classes,class_code,' . $class->id,
            'course_id'        => 'required|exists:courses,id',
            'trainer_id'       => 'required|exists:trainers,id',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after_or_equal:start_date',
            'venue'            => 'required|max:255',
            'max_participants' => 'required|integer|min:1',
            'status'           => 'required'
        ]);

        $class->update($request->all());

        return redirect()
            ->route('classes.index')
            ->with('success', 'Training class updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(TrainingClass $class)
    {
        $class->delete();

        return redirect()
            ->route('classes.index')
            ->with('success', 'Training class deleted successfully.');
    }
}