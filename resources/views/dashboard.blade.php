<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            TrainProConnect Dashboard
        </h2>
    </x-slot>

    <div class="container py-4">

        <!-- Master Data -->
        <div class="row g-4">

            <!-- Courses -->
            <div class="col-md-3">
                <a href="{{ route('courses.index') }}" class="text-decoration-none">
                    <div class="card bg-primary text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Courses</h5>
                            <h1>{{ $courseCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Trainers -->
            <div class="col-md-3">
                <a href="{{ route('trainers.index') }}" class="text-decoration-none">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Trainers</h5>
                            <h1>{{ $trainerCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Participants -->
            <div class="col-md-3">
                <a href="{{ route('participants.index') }}" class="text-decoration-none">
                    <div class="card bg-warning text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Participants</h5>
                            <h1>{{ $participantCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Training Classes -->
            <div class="col-md-3">
                <a href="{{ route('classes.index') }}" class="text-decoration-none">
                    <div class="card bg-danger text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Classes</h5>
                            <h1>{{ $classCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <!-- Operations -->
        <div class="row g-4 mt-2">

            <!-- Enrollments -->
            <div class="col-md-3">
                <a href="{{ route('enrollments.index') }}" class="text-decoration-none">
                    <div class="card bg-info text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Enrollments</h5>
                            <h1>{{ $enrollmentCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Attendance -->
            <div class="col-md-3">
                <a href="{{ route('attendances.index') }}" class="text-decoration-none">
                    <div class="card bg-secondary text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Attendance</h5>
                            <h1>{{ $attendanceCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Certificates -->
            <div class="col-md-3">
                <a href="{{ route('certificates.index') }}" class="text-decoration-none">
                    <div class="card bg-dark text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Certificates</h5>
                            <h1>{{ $certificateCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Payments -->
            <div class="col-md-3">
                <a href="{{ route('payments.index') }}" class="text-decoration-none">
                    <div class="card text-white shadow h-100" style="background:#6f42c1;">
                        <div class="card-body text-center">
                            <h5>Payments</h5>
                            <h1>{{ $paymentCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <!-- Notifications -->
        <div class="row g-4 mt-2">

            <div class="col-md-3">
                <a href="{{ route('notifications.index') }}" class="text-decoration-none">
                    <div class="card text-white shadow h-100" style="background:#fd7e14;">
                        <div class="card-body text-center">
                            <h5>Notifications</h5>
                            <h1>{{ $notificationCount }}</h1>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <!-- Quick Summary -->

        <div class="card mt-5 shadow">

            <div class="card-header fw-bold">
                Quick Summary
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th>Total Courses</th>
                        <td>{{ $courseCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Trainers</th>
                        <td>{{ $trainerCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Participants</th>
                        <td>{{ $participantCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Classes</th>
                        <td>{{ $classCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Enrollments</th>
                        <td>{{ $enrollmentCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Attendance</th>
                        <td>{{ $attendanceCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Certificates</th>
                        <td>{{ $certificateCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Payments</th>
                        <td>{{ $paymentCount }}</td>
                    </tr>

                    <tr>
                        <th>Total Notifications</th>
                        <td>{{ $notificationCount }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>