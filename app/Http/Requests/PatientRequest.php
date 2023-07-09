<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'patient_name' => 'required',
            'patient_gender' => 'required',
            'patient_born' => 'required',
            'patient_brithday' => 'required',
            'patient_age' => 'required',
            'patient_address' => 'required',
            'patient_status' => 'required',
            'patient_image' => 'image',
            'patient_is_bpjs' => 'required',
            'patient_file' => 'image',
        ];
    }
}
