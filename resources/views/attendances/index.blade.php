<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Attendance Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Attendance List</h4>

            <a href="{{ route('attendances.create') }}"
               class="btn btn-primary">

                + Add Attendance

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Participant</th>
                <th>Class</th>
                <th>Date</th>
                <th>Status</th>
                <th width="180">Action</th>

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
                        {{ $attendance->attendance_date }}
                    </td>

                    <td>
                        {{ $attendance->status }}
                    </td>

                    <td>

                        <a href="{{ route('attendances.edit',$attendance) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('attendances.destroy',$attendance) }}"
                            method="POST"
                            style="display:inline">

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

                    <td colspan="6" class="text-center">

                        No attendance record found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>