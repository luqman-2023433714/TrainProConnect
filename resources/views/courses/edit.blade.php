<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Course
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                Edit Course
            </div>

            <div class="card-body">

                <form action="{{ route('courses.update', $course) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Course Code</label>
                        <input
                            type="text"
                            class="form-control"
                            name="course_code"
                            value="{{ $course->course_code }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="course_name"
                            value="{{ $course->course_name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration (Days)</label>
                        <input
                            type="number"
                            class="form-control"
                            name="duration"
                            value="{{ $course->duration }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fee (RM)</label>
                        <input
                            type="number"
                            step="0.01"
                            class="form-control"
                            name="fee"
                            value="{{ $course->fee }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>

                        <textarea
                            class="form-control"
                            name="description"
                            rows="4">{{ $course->description }}</textarea>
                    </div>

                    <button class="btn btn-success">
                        Update Course
                    </button>

                    <a href="{{ route('courses.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>