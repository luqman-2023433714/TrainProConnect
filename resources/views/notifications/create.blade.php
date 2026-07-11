<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Notification
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Notification Information

            </div>

            <div class="card-body">

                <form action="{{ route('notifications.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Participant

                        </label>

                        <select
                            name="participant_id"
                            class="form-select">

                            <option value="">System Notification</option>

                            @foreach($participants as $participant)

                                <option value="{{ $participant->id }}">

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
                            required></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Type

                        </label>

                        <select
                            name="type"
                            class="form-select">

                            <option>Payment</option>
                            <option>Attendance</option>
                            <option>Certificate</option>
                            <option>Class</option>
                            <option>System</option>

                        </select>

                    </div>

                    <button class="btn btn-primary">

                        Save Notification

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