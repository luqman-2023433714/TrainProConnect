<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Payment Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Payment List</h4>

            <a href="{{ route('payments.create') }}"
               class="btn btn-primary">

                + Add Payment

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Payment No</th>
                    <th>Participant</th>
                    <th>Course</th>
                    <th>Amount (RM)</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($payments as $payment)

                    <tr>

                        <td>{{ $payment->id }}</td>

                        <td>
                            {{ $payment->payment_no }}
                        </td>

                        <td>
                            {{ $payment->enrollment->participant->participant_name }}
                        </td>

                        <td>
                            {{ $payment->enrollment->trainingClass->course->course_name }}
                        </td>

                        <td>
                            RM {{ number_format($payment->amount,2) }}
                        </td>

                        <td>
                            {{ $payment->payment_method }}
                        </td>

                        <td>

                            @if($payment->payment_status == 'Payment Verified')

                                <span class="badge bg-success">
                                    {{ $payment->payment_status }}
                                </span>

                            @elseif($payment->payment_status == 'Payment Submitted')

                                <span class="badge bg-info">
                                    {{ $payment->payment_status }}
                                </span>

                            @elseif($payment->payment_status == 'Pending Payment')

                                <span class="badge bg-warning text-dark">
                                    {{ $payment->payment_status }}
                                </span>

                            @elseif($payment->payment_status == 'Payment Rejected')

                                <span class="badge bg-danger">
                                    {{ $payment->payment_status }}
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    {{ $payment->payment_status }}
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $payment->payment_date ?? '-' }}

                        </td>

                        <td>

                            <a href="{{ route('payments.edit',$payment) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('payments.destroy',$payment) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this payment?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center">

                            No payment available.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>