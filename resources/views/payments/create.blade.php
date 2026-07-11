<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Add Payment
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Payment Information

            </div>

            <div class="card-body">

                <form action="{{ route('payments.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment

                        </label>

                        <select
                            name="enrollment_id"
                            class="form-select"
                            required>

                            <option value="">-- Select Enrollment --</option>

                            @foreach($enrollments as $enrollment)

                                <option value="{{ $enrollment->id }}">

                                    {{ $enrollment->participant->participant_name }}
                                    ({{ $enrollment->trainingClass->class_code }}
                                    -
                                    {{ $enrollment->trainingClass->course->course_name }})

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Amount (RM)

                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="amount"
                            class="form-control"
                            placeholder="0.00"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Method

                        </label>

                        <select
                            name="payment_method"
                            class="form-select"
                            required>

                            <option value="">-- Select Payment Method --</option>

                            <option value="FPX">FPX</option>
                            <option value="Credit / Debit Card">Credit / Debit Card</option>
                            <option value="TNG eWallet">TNG eWallet</option>
                            <option value="DuitNow QR">DuitNow QR</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Cash">Cash</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Status

                        </label>

                        <select
                            name="payment_status"
                            class="form-select"
                            required>

                            <option value="Pending Payment">
                                Pending Payment
                            </option>

                            <option value="Payment Submitted">
                                Payment Submitted
                            </option>

                            <option value="Payment Verified">
                                Payment Verified
                            </option>

                            <option value="Payment Rejected">
                                Payment Rejected
                            </option>

                            <option value="Refunded">
                                Refunded
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Transaction Reference

                        </label>

                        <input
                            type="text"
                            name="transaction_reference"
                            class="form-control"
                            placeholder="Example: FPX123456789">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Date

                        </label>

                        <input
                            type="date"
                            name="payment_date"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Remarks

                        </label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control"
                            placeholder="Optional remarks..."></textarea>

                    </div>

                    <button
                        class="btn btn-primary">

                        Save Payment

                    </button>

                    <a
                        href="{{ route('payments.index') }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>