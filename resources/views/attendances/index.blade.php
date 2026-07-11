<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Attendance Management
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
                Attendance List
            </h4>

            <a href="{{ route('attendances.create') }}"
               class="btn btn-primary">

                + Add Attendance

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form method="GET"
                      action="{{ route('attendances.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search participant, class, course, attendance date, status or remarks">

                        </div>

                        <div class="col-md-2 d-grid">

                            <button
                                class="btn btn-dark">

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
                        <th>Class</th>
                        <th>Course</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($attendances as $attendance)

                    <tr>

                        <td>{{ $attendance->id }}</td>

                        <td>
                            {{ $attendance->enrollment->participant->participant_name }}
                        </td>

                        <td>
                            {{ $attendance->enrollment->trainingClass->class_code }}
                        </td>

                        <td>
                            {{ $attendance->enrollment->trainingClass->course->course_name }}
                        </td>

                        <td>
                            {{ $attendance->attendance_date }}
                        </td>

                        <td>
                            {{ $attendance->status }}
                        </td>

                        <td>
                            {{ $attendance->remarks }}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('attendances.edit', $attendance) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('attendances.destroy', $attendance) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this attendance?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No attendance record found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $attendances->links() }}

        </div>

    </div>

</x-app-layout>