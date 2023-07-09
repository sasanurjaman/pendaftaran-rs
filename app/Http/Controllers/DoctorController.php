<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctor.index', [
            'doctors' => Doctor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        if (Auth::user()->role_id == 1) {
            $validateData = $request->validate([
                'role_id' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $validateData['password'] = Hash::make($validateData['password']);

            User::create($validateData);
            return 'ok';
        } else {
            return Auth::user()->role_id;
        }

        return Auth::user()->role_id;
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show', [
            'doctor' => User::join(
                'doctors',
                'users.id',
                '=',
                'doctors.user_id'
            )
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'doctors.*', 'roles.role_name as role_name')
                ->where('doctors.id', $doctor->id)
                ->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
