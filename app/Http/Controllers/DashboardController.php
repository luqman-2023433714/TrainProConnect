<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Notification;
use App\Models\Participant;
use App\Models\Payment;
use App\Models\Trainer;
use App\Models\TrainingClass;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'courseCount' => Course::count(),

            'trainerCount' => Trainer::count(),

            'participantCount' => Participant::count(),

            'classCount' => TrainingClass::count(),

            'enrollmentCount' => Enrollment::count(),

            'attendanceCount' => Attendance::count(),

            'certificateCount' => Certificate::count(),

            'paymentCount' => Payment::count(),

            'notificationCount' => Notification::count(),

        ]);
    }
}