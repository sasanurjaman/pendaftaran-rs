<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('patient.index', [
            'patients' => Patient::all(),
        ]);
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
        $validated = $request->validated();

        $validated['patient_image'] = $request
            ->file('patient_image')
            ->store('/patient');

        if ($request->file('patient_file')) {
            $validated['patient_file'] = $request
                ->file('patient_file')
                ->store('/bpjs');
        }

        Patient::create($validated);

        // create queue nomber
        $date = date('Y-m-d');
        $queue = Queue::where('created_at', 'LIKE', "%$date%")->count() + 1;

        Queue::create([
            'user_id' => Auth::user()->id,
            'queue_number' => $queue,
        ]);

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
        return $patient;
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
