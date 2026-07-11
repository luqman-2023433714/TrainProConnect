<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Participant
        </h2>
    </x-slot>

    <div class="container py-4">

        <form action="{{ route('participants.update', $participant) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="card">

                <div class="card-header">
                    Participant Information
                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>

                        <input
                            type="text"
                            name="participant_name"
                            class="form-control"
                            value="{{ $participant->participant_name }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            IC / Passport

                        </label>

                        <input
                            type="text"
                            name="ic_passport"
                            class="form-control"
                            value="{{ $participant->ic_passport }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ $participant->email }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Phone

                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ $participant->phone }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Company

                        </label>

                        <input
                            type="text"
                            name="company"
                            class="form-control"
                            value="{{ $participant->company }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Active"
                                {{ $participant->status == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ $participant->status == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <div class="card-footer">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Update Participant

                    </button>

                    <a
                        href="{{ route('participants.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>