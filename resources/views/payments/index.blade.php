<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Payment Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4 class="mb-0">

                Payment List

            </h4>

            <a href="{{ route('payments.create') }}"
               class="btn btn-primary">

                + Add Payment

            </a>

        </div>

        <div class="card mb-3">

            <div class="card-body">

                <form
                    method="GET"
                    action="{{ route('payments.index') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                class="form-control"
                                placeholder="Search payment no, participant, course, method, status, reference, verified by or date">

                        </div>

                        <div class="col-md-2 d-grid">

                            <button
                                class="btn btn-dark">

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">ID</th>
                        <th>Payment No</th>
                        <th>Participant</th>
                        <th>Course</th>
                        <th>Amount (RM)</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th>Verified By</th>
                        <th width="180" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($payments as $payment)

                    <tr>

                        <td>{{ $payment->id }}</td>

                        <td>{{ $payment->payment_no }}</td>

                        <td>{{ $payment->enrollment->participant->participant_name }}</td>

                        <td>{{ $payment->enrollment->trainingClass->course->course_name }}</td>

                        <td>RM {{ number_format($payment->amount,2) }}</td>

                        <td>{{ $payment->payment_method }}</td>

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

                        <td>{{ $payment->payment_date ?? '-' }}</td>

                        <td>{{ $payment->verified_by ?? '-' }}</td>

                        <td class="text-center">

                            <a href="{{ route('payments.edit',$payment) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('payments.destroy',$payment) }}"
                                method="POST"
                                class="d-inline">

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

                        <td colspan="10" class="text-center">

                            No payment available.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $payments->links() }}

        </div>

    </div>

</x-app-layout>