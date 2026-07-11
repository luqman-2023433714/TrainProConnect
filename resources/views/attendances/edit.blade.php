<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Attendance
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Attendance Information

            </div>

            <div class="card-body">

                <form action="{{ route('attendances.update',$attendance) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label>Enrollment</label>

                        <select
                            name="enrollment_id"
                            class="form-select">

                            @foreach($enrollments as $enrollment)

                                <option
                                    value="{{ $enrollment->id }}"
                                    {{ $attendance->enrollment_id == $enrollment->id ? 'selected' : '' }}>

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
                            value="{{ $attendance->attendance_date }}">

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Present" {{ $attendance->status=='Present'?'selected':'' }}>Present</option>
                            <option value="Absent" {{ $attendance->status=='Absent'?'selected':'' }}>Absent</option>
                            <option value="Late" {{ $attendance->status=='Late'?'selected':'' }}>Late</option>
                            <option value="Excused" {{ $attendance->status=='Excused'?'selected':'' }}>Excused</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Remarks</label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control">{{ $attendance->remarks }}</textarea>

                    </div>

                    <button class="btn btn-primary">

                        Update Attendance

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