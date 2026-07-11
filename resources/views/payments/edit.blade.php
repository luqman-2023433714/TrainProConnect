<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Edit Payment
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card">

            <div class="card-header">

                Payment Information

            </div>

            <div class="card-body">

                <form action="{{ route('payments.update', $payment) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Number

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $payment->payment_no }}"
                            readonly>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Enrollment

                        </label>

                        <select
                            name="enrollment_id"
                            class="form-select"
                            required>

                            @foreach($enrollments as $enrollment)

                                <option
                                    value="{{ $enrollment->id }}"
                                    {{ $payment->enrollment_id == $enrollment->id ? 'selected' : '' }}>

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
                            value="{{ $payment->amount }}"
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

                            <option value="FPX"
                                {{ $payment->payment_method == 'FPX' ? 'selected' : '' }}>
                                FPX
                            </option>

                            <option value="Credit / Debit Card"
                                {{ $payment->payment_method == 'Credit / Debit Card' ? 'selected' : '' }}>
                                Credit / Debit Card
                            </option>

                            <option value="TNG eWallet"
                                {{ $payment->payment_method == 'TNG eWallet' ? 'selected' : '' }}>
                                TNG eWallet
                            </option>

                            <option value="DuitNow QR"
                                {{ $payment->payment_method == 'DuitNow QR' ? 'selected' : '' }}>
                                DuitNow QR
                            </option>

                            <option value="Bank Transfer"
                                {{ $payment->payment_method == 'Bank Transfer' ? 'selected' : '' }}>
                                Bank Transfer
                            </option>

                            <option value="Cash"
                                {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>
                                Cash
                            </option>

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

                            <option value="Pending Payment"
                                {{ $payment->payment_status == 'Pending Payment' ? 'selected' : '' }}>
                                Pending Payment
                            </option>

                            <option value="Payment Submitted"
                                {{ $payment->payment_status == 'Payment Submitted' ? 'selected' : '' }}>
                                Payment Submitted
                            </option>

                            <option value="Payment Verified"
                                {{ $payment->payment_status == 'Payment Verified' ? 'selected' : '' }}>
                                Payment Verified
                            </option>

                            <option value="Payment Rejected"
                                {{ $payment->payment_status == 'Payment Rejected' ? 'selected' : '' }}>
                                Payment Rejected
                            </option>

                            <option value="Refunded"
                                {{ $payment->payment_status == 'Refunded' ? 'selected' : '' }}>
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
                            value="{{ $payment->transaction_reference }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Payment Date

                        </label>

                        <input
                            type="date"
                            name="payment_date"
                            class="form-control"
                            value="{{ $payment->payment_date }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Remarks

                        </label>

                        <textarea
                            name="remarks"
                            rows="3"
                            class="form-control">{{ $payment->remarks }}</textarea>

                    </div>

                    @if($payment->verified_by)

                        <div class="alert alert-success">

                            <strong>Verified By:</strong>
                            {{ $payment->verified_by }}

                            <br>

                            <strong>Verified At:</strong>
                            {{ $payment->verified_at }}

                        </div>

                    @endif

                    <button class="btn btn-primary">

                        Update Payment

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