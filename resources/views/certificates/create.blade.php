<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Certificate
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Certificate Information

            </div>

            <div class="card-body">

                <form action="{{ route('certificates.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment

                        </label>

                        <select
                            name="enrollment_id"
                            class="form-select"
                            required>

                            <option value="">

                                -- Select Enrollment --

                            </option>

                            @foreach($enrollments as $enrollment)

                                <option value="{{ $enrollment->id }}">

                                    {{ $enrollment->participant->participant_name }}
                                    -
                                    {{ $enrollment->trainingClass->course->course_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Issue Date

                        </label>

                        <input
                            type="date"
                            name="issue_date"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Draft">

                                Draft

                            </option>

                            <option value="Issued">

                                Issued

                            </option>

                            <option value="Revoked">

                                Revoked

                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Remarks

                        </label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control"></textarea>

                    </div>

                    <button
                        class="btn btn-primary">

                        Save Certificate

                    </button>

                    <a
                        href="{{ route('certificates.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>