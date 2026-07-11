<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Trainer Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Trainer List</h4>

            <a href="{{ route('trainers.create') }}"
               class="btn btn-primary">

                + Add Trainer

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Specialization</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($trainers as $trainer)

                <tr>

                    <td>{{ $trainer->id }}</td>
                    <td>{{ $trainer->trainer_name }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <td>{{ $trainer->specialization }}</td>
                    <td>{{ $trainer->status }}</td>

                    <td>

                        <a href="{{ route('trainers.edit',$trainer) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('trainers.destroy',$trainer) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this trainer?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No trainer available.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>