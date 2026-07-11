<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add New Participant
        </h2>
    </x-slot>

    <div class="container py-4">

        <form action="{{ route('participants.store') }}" method="POST">

            @csrf

            <div class="card">

                <div class="card-header">
                    Participant Information
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label>Name</label>
                        <input
                            type="text"
                            name="participant_name"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>IC / Passport</label>
                        <input
                            type="text"
                            name="ic_passport"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company</label>
                        <input
                            type="text"
                            name="company"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>

                        </select>
                    </div>

                </div>

                <div class="card-footer">

                    <button class="btn btn-primary">

                        Save Participant

                    </button>

                    <a href="{{ route('participants.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>