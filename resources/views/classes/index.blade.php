<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Training Class Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Training Class List</h4>

            <a href="{{ route('classes.create') }}"
               class="btn btn-primary">

                + Add Training Class

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Class Code</th>
                    <th>Course</th>
                    <th>Trainer</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Venue</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($classes as $class)

                <tr>

                    <td>{{ $class->id }}</td>

                    <td>{{ $class->class_code }}</td>

                    <td>{{ $class->course->course_name }}</td>

                    <td>{{ $class->trainer->trainer_name }}</td>

                    <td>{{ $class->start_date }}</td>

                    <td>{{ $class->end_date }}</td>

                    <td>{{ $class->venue }}</td>

                    <td>{{ $class->max_participants }}</td>

                    <td>{{ $class->status }}</td>

                    <td>

                        <a href="{{ route('classes.edit',$class) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('classes.destroy',$class) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this class?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="10"
                        class="text-center">

                        No training class available.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>