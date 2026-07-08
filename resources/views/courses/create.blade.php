<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add New Course
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                Course Information
            </div>

            <div class="card-body">

                <form action="{{ route('courses.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Course Code</label>
                        <input
                            type="text"
                            name="course_code"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course Name</label>
                        <input
                            type="text"
                            name="course_name"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration (Days)</label>
                        <input
                            type="number"
                            name="duration"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fee (RM)</label>
                        <input
                            type="number"
                            step="0.01"
                            name="fee"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"></textarea>
                    </div>

                    <button class="btn btn-primary">
                        Save Course
                    </button>

                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>