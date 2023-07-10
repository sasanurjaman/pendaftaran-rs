<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();

        if (Auth::user()->role_id == 2) {
            return view('schedule.index', [
                'schedules' => Schedule::where('doctor_id', $doctor->id)
                    ->latest()
                    ->get(),
                'doctor' => $doctor,
            ]);
        } else {
            return view('schedule.index', [
                'schedules' => Schedule::all(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Schedule::create([
            'doctor_id' => $request->doctor_id,
            'schedule_name' => $request->schedule_name,
            'schedule_date' => $request->schedule_date,
        ]);

        return redirect('/schedule');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update([
            'doctor_id' => $request->doctor_id,
            'schedule_name' => $request->schedule_name,
            'schedule_date' => $request->schedule_date,
        ]);

        return redirect('/schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/schedule');
    }
}
