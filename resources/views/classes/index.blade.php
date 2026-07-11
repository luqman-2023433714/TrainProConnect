<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Training Class Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4 class="mb-0">
                Training Class List
            </h4>

            <a href="{{ route('classes.create') }}"
               class="btn btn-primary">

                + Add Training Class

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form method="GET"
                      action="{{ route('classes.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search class code, course, trainer, venue or status">

                        </div>

                        <div class="col-md-2 d-grid">

                            <button
                                class="btn btn-dark">

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">ID</th>
                        <th>Class Code</th>
                        <th>Course</th>
                        <th>Trainer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Venue</th>
                        <th width="90">Capacity</th>
                        <th width="100">Status</th>
                        <th width="180" class="text-center">Action</th>

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

                        <td class="text-center">

                            <a href="{{ route('classes.edit', $class) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('classes.destroy', $class) }}"
                                method="POST"
                                class="d-inline">

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

                        <td colspan="10" class="text-center">

                            No training class available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $classes->links() }}

        </div>

    </div>

</x-app-layout>