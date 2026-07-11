<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $certificates = Certificate::with([
                'enrollment.participant',
                'enrollment.trainingClass.course'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where('certificate_no', 'like', "%{$search}%")
                    ->orWhere('issue_date', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('remarks', 'like', "%{$search}%")

                    ->orWhereHas('enrollment.participant', function ($q) use ($search) {

                        $q->where('participant_name', 'like', "%{$search}%");

                    })

                    ->orWhereHas('enrollment.trainingClass.course', function ($q) use ($search) {

                        $q->where('course_name', 'like', "%{$search}%")
                          ->orWhere('course_code', 'like', "%{$search}%");

                    });

            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('certificates.index', compact(
            'certificates',
            'search'
        ));
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

        return view('certificates.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required',
            'issue_date'    => 'required|date',
            'status'        => 'required',
            'remarks'       => 'nullable'
        ]);

        $last = Certificate::latest()->first();

        if ($last) {
            $number = intval(substr($last->certificate_no, -6)) + 1;
        } else {
            $number = 1;
        }

        $certificateNo = 'CERT-' . date('Y') . '-' . str_pad($number, 6, '0', STR_PAD_LEFT);

        Certificate::create([
            'certificate_no' => $certificateNo,
            'enrollment_id'  => $request->enrollment_id,
            'issue_date'     => $request->issue_date,
            'status'         => $request->status,
            'remarks'        => $request->remarks
        ]);

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $enrollments = Enrollment::with([
            'participant',
            'trainingClass.course'
        ])->get();

        return view('certificates.edit', compact(
            'certificate',
            'enrollments'
        ));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'enrollment_id' => 'required',
            'issue_date'    => 'required|date',
            'status'        => 'required',
            'remarks'       => 'nullable'
        ]);

        $certificate->update([
            'enrollment_id' => $request->enrollment_id,
            'issue_date'    => $request->issue_date,
            'status'        => $request->status,
            'remarks'       => $request->remarks
        ]);

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}