<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $attendances = Attendance::with([
                'enrollment.participant',
                'enrollment.trainingClass.course'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where('attendance_date', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('remarks', 'like', "%{$search}%")

                    ->orWhereHas('enrollment.participant', function ($q) use ($search) {

                        $q->where('participant_name', 'like', "%{$search}%");

                    })

                    ->orWhereHas('enrollment.trainingClass', function ($q) use ($search) {

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

        return view('attendances.index', compact(
            'attendances',
            'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::with([
            'participant',
            'trainingClass.course'
        ])->get();

        return view('attendances.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([

            'enrollment_id'   => 'required|exists:enrollments,id',
            'attendance_date' => 'required|date',
            'status'          => 'required',
            'remarks'         => 'nullable'

        ]);

        Attendance::create($request->all());

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $enrollments = Enrollment::with([
            'participant',
            'trainingClass.course'
        ])->get();

        return view('attendances.edit', compact(
            'attendance',
            'enrollments'
        ));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([

            'enrollment_id'   => 'required|exists:enrollments,id',
            'attendance_date' => 'required|date',
            'status'          => 'required',
            'remarks'         => 'nullable'

        ]);

        $attendance->update($request->all());

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}