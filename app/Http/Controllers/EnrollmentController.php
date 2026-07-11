<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Participant;
use App\Models\TrainingClass;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $enrollments = Enrollment::with([
                'participant',
                'trainingClass.course',
                'trainingClass.trainer'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where('attendance_status', 'like', "%{$search}%")
                    ->orWhere('completion_status', 'like', "%{$search}%")
                    ->orWhere('enrollment_date', 'like', "%{$search}%")

                    ->orWhereHas('participant', function ($q) use ($search) {
                        $q->where('participant_name', 'like', "%{$search}%");
                    })

                    ->orWhereHas('trainingClass', function ($q) use ($search) {

                        $q->where('class_code', 'like', "%{$search}%")

                          ->orWhereHas('course', function ($course) use ($search) {

                              $course->where('course_name', 'like', "%{$search}%")
                                     ->orWhere('course_code', 'like', "%{$search}%");

                          });

                    });

            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('enrollments.index', compact(
            'enrollments',
            'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $participants = Participant::all();

        $classes = TrainingClass::with('course')->get();

        return view('enrollments.create', compact(
            'participants',
            'classes'
        ));
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([

            'participant_id' => 'required',
            'training_class_id' => 'required',
            'enrollment_date' => 'required|date',
            'attendance_status' => 'required',
            'completion_status' => 'required',
            'remarks' => 'nullable'

        ]);

        Enrollment::create($request->all());

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $participants = Participant::all();

        $classes = TrainingClass::with('course')->get();

        return view('enrollments.edit', compact(
            'enrollment',
            'participants',
            'classes'
        ));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([

            'participant_id' => 'required',
            'training_class_id' => 'required',
            'enrollment_date' => 'required|date',
            'attendance_status' => 'required',
            'completion_status' => 'required',
            'remarks' => 'nullable'

        ]);

        $enrollment->update($request->all());

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}