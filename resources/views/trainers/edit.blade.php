<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Trainer
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Trainer Information

            </div>

            <div class="card-body">

                <form action="{{ route('trainers.update',$trainer) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Trainer Name

                        </label>

                        <input
                            type="text"
                            name="trainer_name"
                            class="form-control"
                            value="{{ old('trainer_name',$trainer->trainer_name) }}"
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
                            value="{{ old('email',$trainer->email) }}"
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
                            value="{{ old('phone',$trainer->phone) }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Specialization

                        </label>

                        <input
                            type="text"
                            name="specialization"
                            class="form-control"
                            value="{{ old('specialization',$trainer->specialization) }}"
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
                                {{ $trainer->status=='Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ $trainer->status=='Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <button class="btn btn-primary">

                        Update Trainer

                    </button>

                    <a href="{{ route('trainers.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>