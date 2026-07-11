<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Notification
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Notification Information

            </div>

            <div class="card-body">

                <form action="{{ route('notifications.update',$notification) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Participant

                        </label>

                        <select
                            name="participant_id"
                            class="form-select">

                            <option value="">System Notification</option>

                            @foreach($participants as $participant)

                                <option
                                    value="{{ $participant->id }}"
                                    {{ $notification->participant_id==$participant->id ? 'selected':'' }}>

                                    {{ $participant->participant_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Title

                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ $notification->title }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Message

                        </label>

                        <textarea
                            name="message"
                            rows="4"
                            class="form-control"
                            required>{{ $notification->message }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Type

                        </label>

                        <select
                            name="type"
                            class="form-select">

                            <option value="Payment" {{ $notification->type=='Payment'?'selected':'' }}>Payment</option>
                            <option value="Attendance" {{ $notification->type=='Attendance'?'selected':'' }}>Attendance</option>
                            <option value="Certificate" {{ $notification->type=='Certificate'?'selected':'' }}>Certificate</option>
                            <option value="Class" {{ $notification->type=='Class'?'selected':'' }}>Class</option>
                            <option value="System" {{ $notification->type=='System'?'selected':'' }}>System</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Unread" {{ $notification->status=='Unread'?'selected':'' }}>Unread</option>
                            <option value="Read" {{ $notification->status=='Read'?'selected':'' }}>Read</option>

                        </select>

                    </div>

                    <button class="btn btn-primary">

                        Update Notification

                    </button>

                    <a href="{{ route('notifications.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>