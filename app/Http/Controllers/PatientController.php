<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        // dd($request);
        $validated = $request->validated();

        if ($request->file('')) {
            # code...
        }
        $validated['patient_image'] = $request
            ->file('patient_image')
            ->store('/patient');

        if ($request->file('patient_file')) {
            $validated['patient_file'] = $request
                ->file('patient_file')
                ->store('/bpjs');
        }

        Patient::create($validated);

        return redirect('/dashboard')->with(
            'success',
            'pendaftaran pasien berhasil dilakukab'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
