<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Enrollment
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Enrollment Information

            </div>

            <div class="card-body">

                <form action="{{ route('enrollments.update',$enrollment) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Participant

                        </label>

                        <select
                            name="participant_id"
                            class="form-select">

                            @foreach($participants as $participant)

                                <option
                                    value="{{ $participant->id }}"
                                    {{ $participant->id == $enrollment->participant_id ? 'selected' : '' }}>

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
                            class="form-select">

                            @foreach($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    {{ $class->id == $enrollment->training_class_id ? 'selected' : '' }}>

                                    {{ $class->class_code }}

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
                            value="{{ $enrollment->enrollment_date }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Attendance Status

                        </label>

                        <select
                            name="attendance_status"
                            class="form-select">

                            <option value="Pending" {{ $enrollment->attendance_status=='Pending'?'selected':'' }}>Pending</option>
                            <option value="Present" {{ $enrollment->attendance_status=='Present'?'selected':'' }}>Present</option>
                            <option value="Absent" {{ $enrollment->attendance_status=='Absent'?'selected':'' }}>Absent</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Completion Status

                        </label>

                        <select
                            name="completion_status"
                            class="form-select">

                            <option value="Ongoing" {{ $enrollment->completion_status=='Ongoing'?'selected':'' }}>Ongoing</option>
                            <option value="Completed" {{ $enrollment->completion_status=='Completed'?'selected':'' }}>Completed</option>
                            <option value="Failed" {{ $enrollment->completion_status=='Failed'?'selected':'' }}>Failed</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Remarks

                        </label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control">{{ $enrollment->remarks }}</textarea>

                    </div>

                    <button class="btn btn-primary">

                        Update Enrollment

                    </button>

                    <a href="{{ route('enrollments.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>