<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Training Class
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Training Class Information

            </div>

            <div class="card-body">

                <form action="{{ route('classes.update', $class) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Class Code

                        </label>

                        <input
                            type="text"
                            name="class_code"
                            class="form-control"
                            value="{{ old('class_code', $class->class_code) }}"
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

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ $course->id == $class->course_id ? 'selected' : '' }}>

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

                            @foreach($trainers as $trainer)

                                <option
                                    value="{{ $trainer->id }}"
                                    {{ $trainer->id == $class->trainer_id ? 'selected' : '' }}>

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
                                    value="{{ $class->start_date }}"
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
                                    value="{{ $class->end_date }}"
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
                            value="{{ $class->venue }}"
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
                            value="{{ $class->max_participants }}"
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

                            <option value="Open"
                                {{ $class->status == 'Open' ? 'selected' : '' }}>
                                Open
                            </option>

                            <option value="Closed"
                                {{ $class->status == 'Closed' ? 'selected' : '' }}>
                                Closed
                            </option>

                            <option value="Completed"
                                {{ $class->status == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>

                    <button
                        class="btn btn-primary">

                        Update Training Class

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