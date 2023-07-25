<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
        if (Auth::user()->role_id == 2) {
            if (Doctor::where('user_id', Auth::user()->id)->count() == 1) {
                return view('dashboard');
            } else {
                return redirect()->route('doctor.create');
            }
        } else {
            return view('dashboard');
        }
    }
}
