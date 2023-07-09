<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'doctor_name' => 'required|max:128',
            'doctor_gender' => 'required',
            'doctor_brithday' => 'required',
            'doctor_address' => 'required',
            'doctor_specialization' => 'required',
            'doctor_image' => 'image',
        ];
    }
}
