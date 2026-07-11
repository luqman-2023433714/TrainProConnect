<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with([
            'enrollment.participant',
            'enrollment.trainingClass.course'
        ])->get();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::with([
            'participant',
            'trainingClass.course'
        ])->get();

        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([

            'enrollment_id'         => 'required',
            'amount'                => 'required|numeric',
            'payment_method'        => 'required',
            'payment_status'        => 'required',
            'transaction_reference' => 'nullable',
            'payment_date'          => 'nullable|date',
            'remarks'               => 'nullable'

        ]);

        // Generate Payment Number
        $last = Payment::latest()->first();

        if ($last) {

            $number = intval(substr($last->payment_no, -6)) + 1;

        } else {

            $number = 1;

        }

        $paymentNo = 'PAY-' . date('Y') . '-' . str_pad($number, 6, '0', STR_PAD_LEFT);

        Payment::create([

            'payment_no'            => $paymentNo,
            'enrollment_id'         => $request->enrollment_id,
            'amount'                => $request->amount,
            'payment_method'        => $request->payment_method,
            'payment_status'        => $request->payment_status,
            'transaction_reference' => $request->transaction_reference,
            'payment_date'          => $request->payment_date,
            'verified_by'           => null,
            'verified_at'           => null,
            'remarks'               => $request->remarks

        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $enrollments = Enrollment::with([
            'participant',
            'trainingClass.course'
        ])->get();

        return view('payments.edit', compact(
            'payment',
            'enrollments'
        ));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([

            'enrollment_id'         => 'required',
            'amount'                => 'required|numeric',
            'payment_method'        => 'required',
            'payment_status'        => 'required',
            'transaction_reference' => 'nullable',
            'payment_date'          => 'nullable|date',
            'remarks'               => 'nullable'

        ]);

        $verifiedBy = null;
        $verifiedAt = null;

        if ($request->payment_status == 'Payment Verified') {

            $verifiedBy = auth()->user()->name;
            $verifiedAt = now();

        }

        $payment->update([

            'enrollment_id'         => $request->enrollment_id,
            'amount'                => $request->amount,
            'payment_method'        => $request->payment_method,
            'payment_status'        => $request->payment_status,
            'transaction_reference' => $request->transaction_reference,
            'payment_date'          => $request->payment_date,
            'verified_by'           => $verifiedBy,
            'verified_at'           => $verifiedAt,
            'remarks'               => $request->remarks

        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}