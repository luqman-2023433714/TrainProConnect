<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Notification Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Notification List</h4>

            <a href="{{ route('notifications.create') }}"
               class="btn btn-primary">

                + Add Notification

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Participant</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="180">Action</th>

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

                        <td>{{ $notification->type }}</td>

                        <td>

                            @if($notification->status=='Unread')

                                <span class="badge bg-danger">
                                    Unread
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Read
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('notifications.edit',$notification) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('notifications.destroy',$notification) }}"
                                  method="POST"
                                  style="display:inline">

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

                        <td colspan="6" class="text-center">

                            No notification available.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>