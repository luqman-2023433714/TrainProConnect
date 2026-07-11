<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Enrollment Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Enrollment List</h4>

            <a href="{{ route('enrollments.create') }}"
               class="btn btn-primary">

                + Add Enrollment

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Participant</th>
                    <th>Training Class</th>
                    <th>Enrollment Date</th>
                    <th>Attendance</th>
                    <th>Completion</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($enrollments as $enrollment)

                <tr>

                    <td>{{ $enrollment->id }}</td>

                    <td>{{ $enrollment->participant->participant_name }}</td>

                    <td>{{ $enrollment->trainingClass->class_code }}</td>

                    <td>{{ $enrollment->enrollment_date }}</td>

                    <td>{{ $enrollment->attendance_status }}</td>

                    <td>{{ $enrollment->completion_status }}</td>

                    <td>

                        <a href="{{ route('enrollments.edit',$enrollment) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('enrollments.destroy',$enrollment) }}"
                              method="POST"
                              style="display:inline">

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

                    <td colspan="7" class="text-center">

                        No enrollment available.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>