<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Trainer Management
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
                Trainer List
            </h4>

            <a href="{{ route('trainers.create') }}"
               class="btn btn-primary">

                + Add Trainer

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form method="GET"
                      action="{{ route('trainers.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search by name, email, phone, specialization or status">

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Specialization</th>
                        <th width="120">Status</th>
                        <th width="180" class="text-center">Action</th>
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

                        <td class="text-center">

                            <a href="{{ route('trainers.edit',$trainer) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('trainers.destroy',$trainer) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
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

        <div class="mt-3">

            {{ $trainers->links() }}

        </div>

    </div>

</x-app-layout>