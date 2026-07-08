<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display all courses
     */
    public function index()
    {
        $courses = Course::orderBy('id')->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store new course
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|max:20|unique:courses',
            'course_name' => 'required|max:100',
            'duration'    => 'required|integer|min:1',
            'fee'         => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        Course::create([
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'duration'    => $request->duration,
            'fee'         => $request->fee,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course added successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update course
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_code' => 'required|max:20|unique:courses,course_code,' . $course->id,
            'course_name' => 'required|max:100',
            'duration'    => 'required|integer|min:1',
            'fee'         => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $course->update([
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'duration'    => $request->duration,
            'fee'         => $request->fee,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Delete course
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}