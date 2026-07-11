<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit User
        </h2>
    </x-slot>

    <div class="container py-4">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="card">

            <div class="card-header">

                User Information

            </div>

            <div class="card-body">

                <form
                    action="{{ route('users.update',$user) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name',$user->name) }}"
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
                            value="{{ old('email',$user->email) }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Role

                        </label>

                        <select
                            name="role_id"
                            class="form-select"
                            required>

                            @foreach($roles as $role)

                                <option
                                    value="{{ $role->id }}"
                                    {{ $user->role_id == $role->id ? 'selected' : '' }}>

                                    {{ $role->role_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <hr>

                    <div class="alert alert-info">

                        Leave the password fields empty if you do not want to change the password.

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            New Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Confirm Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>

                    <button
                        class="btn btn-primary">

                        Update User

                    </button>

                    <a
                        href="{{ route('users.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>