<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Notification Management
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

                Notification List

            </h4>

            <a href="{{ route('notifications.create') }}"
               class="btn btn-primary">

                + Add Notification

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form
                    method="GET"
                    action="{{ route('notifications.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search participant, title, message, type or status">

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
                        <th>Participant</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($notifications as $notification)

                    <tr>

                        <td>{{ $notification->id }}</td>

                        <td>
                            {{ $notification->participant->participant_name ?? 'System Notification' }}
                        </td>

                        <td>{{ $notification->title }}</td>

                        <td>{{ Str::limit($notification->message, 50) }}</td>

                        <td>{{ $notification->type }}</td>

                        <td>

                            @if($notification->status == 'Unread')

                                <span class="badge bg-danger">

                                    Unread

                                </span>

                            @else

                                <span class="badge bg-success">

                                    Read

                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a
                                href="{{ route('notifications.edit', $notification) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('notifications.destroy', $notification) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this notification?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No notification available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $notifications->links() }}

        </div>

    </div>

</x-app-layout>