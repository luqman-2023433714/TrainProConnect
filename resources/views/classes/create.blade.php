<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Training Class
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Training Class Information

            </div>

            <div class="card-body">

                <form action="{{ route('classes.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Class Code

                        </label>

                        <input
                            type="text"
                            name="class_code"
                            class="form-control"
                            value="{{ old('class_code') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Course

                        </label>

                        <select
                            name="course_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Course --</option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}">

                                    {{ $course->course_code }} - {{ $course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Trainer

                        </label>

                        <select
                            name="trainer_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Trainer --</option>

                            @foreach($trainers as $trainer)

                                <option
                                    value="{{ $trainer->id }}">

                                    {{ $trainer->trainer_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">

                                    Start Date

                                </label>

                                <input
                                    type="date"
                                    name="start_date"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">

                                    End Date

                                </label>

                                <input
                                    type="date"
                                    name="end_date"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Venue

                        </label>

                        <input
                            type="text"
                            name="venue"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Maximum Participants

                        </label>

                        <input
                            type="number"
                            name="max_participants"
                            class="form-control"
                            min="1"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Open">

                                Open

                            </option>

                            <option value="Closed">

                                Closed

                            </option>

                            <option value="Completed">

                                Completed

                            </option>

                        </select>

                    </div>

                    <button
                        class="btn btn-primary">

                        Save Training Class

                    </button>

                    <a
                        href="{{ route('classes.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>