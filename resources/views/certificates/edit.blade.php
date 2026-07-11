<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Certificate
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Certificate Information

            </div>

            <div class="card-body">

                <form action="{{ route('certificates.update', $certificate) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Certificate Number

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $certificate->certificate_no }}"
                            readonly>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment

                        </label>

                        <select
                            name="enrollment_id"
                            class="form-select">

                            @foreach($enrollments as $enrollment)

                                <option
                                    value="{{ $enrollment->id }}"
                                    {{ $certificate->enrollment_id == $enrollment->id ? 'selected' : '' }}>

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
                            value="{{ $certificate->issue_date }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Draft"
                                {{ $certificate->status == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="Issued"
                                {{ $certificate->status == 'Issued' ? 'selected' : '' }}>
                                Issued
                            </option>

                            <option value="Revoked"
                                {{ $certificate->status == 'Revoked' ? 'selected' : '' }}>
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
                            class="form-control">{{ $certificate->remarks }}</textarea>

                    </div>

                    <button class="btn btn-primary">

                        Update Certificate

                    </button>

                    <a href="{{ route('certificates.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>