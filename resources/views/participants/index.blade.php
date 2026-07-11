<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Participant Management
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

            <h2 class="mb-0">
                Participant List
            </h2>

            <a href="{{ route('participants.create') }}"
               class="btn btn-primary">

                + Add Participant

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form method="GET"
                      action="{{ route('participants.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search by name, IC/Passport, email, phone, company or status">

                        </div>

                        <div class="col-md-2 d-grid">

                            <button class="btn btn-dark">

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
                        <th>IC / Passport</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th width="120">Status</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($participants as $participant)

                    <tr>

                        <td>{{ $participant->id }}</td>
                        <td>{{ $participant->participant_name }}</td>
                        <td>{{ $participant->ic_passport }}</td>
                        <td>{{ $participant->email }}</td>
                        <td>{{ $participant->phone }}</td>
                        <td>{{ $participant->company }}</td>
                        <td>{{ $participant->status }}</td>

                        <td class="text-center">

                            <a href="{{ route('participants.edit',$participant) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('participants.destroy',$participant) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this participant?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No participant available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $participants->links() }}

        </div>

    </div>

</x-app-layout>