<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Enrollment Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4 class="mb-0">
                Enrollment List
            </h4>

            <a href="{{ route('enrollments.create') }}"
               class="btn btn-primary">

                + Add Enrollment

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form method="GET"
                      action="{{ route('enrollments.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search participant, class, course, attendance, completion or date">

                        </div>

                        <div class="col-md-2 d-grid">

                            <button class="btn btn-dark">

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">ID</th>
                        <th>Participant</th>
                        <th>Training Class</th>
                        <th>Course</th>
                        <th>Enrollment Date</th>
                        <th>Attendance</th>
                        <th>Completion</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($enrollments as $enrollment)

                    <tr>

                        <td>{{ $enrollment->id }}</td>

                        <td>{{ $enrollment->participant->participant_name }}</td>

                        <td>{{ $enrollment->trainingClass->class_code }}</td>

                        <td>{{ $enrollment->trainingClass->course->course_name }}</td>

                        <td>{{ $enrollment->enrollment_date }}</td>

                        <td>{{ $enrollment->attendance_status }}</td>

                        <td>{{ $enrollment->completion_status }}</td>

                        <td class="text-center">

                            <a href="{{ route('enrollments.edit', $enrollment) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('enrollments.destroy', $enrollment) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this enrollment?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No enrollment available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $enrollments->links() }}

        </div>

    </div>

</x-app-layout>