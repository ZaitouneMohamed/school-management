<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'admission_number' => ["required", "max:250"],
            'role_number' => ["required", "max:250"],
            'class_id' => ['required', 'exists:classes,id'],
            'gender' => ['required', 'string', 'max:255'],
            'date_of_birth' => ["required", "date"],
            'caste' => ['required', 'string', 'max:255'],
            'religion' => ['nullable', 'string', 'max:255'],
            'mobile' => ['required', "string", "max:200"],
            'admission_date' => ['required', 'date'],
            'profile_pic' => ['nullable', 'image'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'password' => "required",
            'height' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'string', 'max:255'],
        ];
    }
}
