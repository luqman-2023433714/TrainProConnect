<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Enrollment
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Enrollment Information

            </div>

            <div class="card-body">

                <form action="{{ route('enrollments.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Participant

                        </label>

                        <select
                            name="participant_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Participant --</option>

                            @foreach($participants as $participant)

                                <option value="{{ $participant->id }}">

                                    {{ $participant->participant_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Training Class

                        </label>

                        <select
                            name="training_class_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Class --</option>

                            @foreach($classes as $class)

                                <option value="{{ $class->id }}">

                                    {{ $class->class_code }}
                                    -
                                    {{ $class->course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment Date

                        </label>

                        <input
                            type="date"
                            name="enrollment_date"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Attendance Status

                        </label>

                        <select
                            name="attendance_status"
                            class="form-select">

                            <option>Pending</option>
                            <option>Present</option>
                            <option>Absent</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Completion Status

                        </label>

                        <select
                            name="completion_status"
                            class="form-select">

                            <option>Ongoing</option>
                            <option>Completed</option>
                            <option>Failed</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Remarks

                        </label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control"></textarea>

                    </div>

                    <button
                        class="btn btn-primary">

                        Save Enrollment

                    </button>

                    <a
                        href="{{ route('enrollments.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>