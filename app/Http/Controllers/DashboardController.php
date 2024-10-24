<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->role_id) {
            case 2: // Role Doctor
                $doctor = Doctor::where('user_id', Auth::user()->id)->first();
                if ($doctor) {
                    return redirect()->route('doctor.show', $doctor->id);
                } else {
                    return redirect()->route('doctor.create');
                }
                break;

            case 3: // Role Patient
                $patient = Patient::where('user_id', Auth::user()->id)->first();
                if ($patient) {
                    return redirect()->route('patient.show', $patient->id);
                } else {
                    return redirect()->route('patient.create');
                }
                break;

            default:
                return view('dashboard');
        }
    }
}
