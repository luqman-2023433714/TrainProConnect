<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Attendance
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Attendance Information

            </div>

            <div class="card-body">

                <form action="{{ route('attendances.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment

                        </label>

                        <select
                            name="enrollment_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Enrollment --</option>

                            @foreach($enrollments as $enrollment)

                                <option value="{{ $enrollment->id }}">

                                    {{ $enrollment->participant->participant_name }}
                                    -
                                    {{ $enrollment->trainingClass->class_code }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Date</label>

                        <input
                            type="date"
                            name="attendance_date"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-select">

                            <option>Present</option>
                            <option>Absent</option>
                            <option>Late</option>
                            <option>Excused</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Remarks</label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control"></textarea>

                    </div>

                    <button
                        class="btn btn-primary">

                        Save Attendance

                    </button>

                    <a
                        href="{{ route('attendances.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>