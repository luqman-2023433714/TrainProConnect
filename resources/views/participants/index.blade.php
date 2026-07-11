<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Participant Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2>Participant List</h2>

            <a href="{{ route('participants.create') }}"
               class="btn btn-primary">

                + Add Participant

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>IC / Passport</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th width="180">Action</th>

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

                    <td>

                        <a href="{{ route('participants.edit',$participant) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('participants.destroy',$participant) }}"
                              method="POST"
                              style="display:inline">

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

</x-app-layout>