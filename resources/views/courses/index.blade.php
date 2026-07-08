<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Course Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3 class="mb-0">Course List</h3>

            <a href="{{ route('courses.create') }}"
               class="btn btn-primary">

                + Add Course

            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">ID</th>
                        <th width="140">Course Code</th>
                        <th>Course Name</th>
                        <th width="120">Duration</th>
                        <th width="120">Fee (RM)</th>
                        <th>Description</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($courses as $course)

                    <tr>

                        <td>{{ $course->id }}</td>

                        <td>{{ $course->course_code }}</td>

                        <td>{{ $course->course_name }}</td>

                        <td>{{ $course->duration }} Days</td>

                        <td>{{ number_format($course->fee,2) }}</td>

                        <td>{{ $course->description }}</td>

                        <td class="text-center">

                            <a href="{{ route('courses.edit',$course) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('courses.destroy',$course) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this course?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No course available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>