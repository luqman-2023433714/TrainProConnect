<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            User Management
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

                User List

            </h4>

            <a
                href="{{ route('users.create') }}"
                class="btn btn-primary">

                + Add User

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form
                    method="GET"
                    action="{{ route('users.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                value="{{ $search }}"
                                placeholder="Search by name or email">

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

                        <th width="150">

                            Role

                        </th>

                        <th width="180"
                            class="text-center">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>

                            {{ $user->id }}

                        </td>

                        <td>

                            {{ $user->name }}

                        </td>

                        <td>

                            {{ $user->email }}

                        </td>

                        <td>

                            {{ $user->role->role_name ?? '-' }}

                        </td>

                        <td class="text-center">

                            <a
                                href="{{ route('users.edit',$user) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('users.destroy',$user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this user?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center">

                            No user found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $users->links() }}

        </div>

    </div>

</x-app-layout>