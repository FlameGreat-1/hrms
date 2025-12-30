<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('skills')) {
            $skills = $this->input('skills');
            
            // Handle both string and array cases
            if (is_string($skills)) {
                $skills = array_filter(
                    explode(',', trim($skills, ',')),
                    fn($value) => !empty($value) && $value !== ''
                );
            } elseif (is_array($skills)) {
                $skills = array_filter(
                    $skills,
                    fn($value) => !is_null($value) && $value !== ''
                );
            }
            
            $this->merge(['skills' => array_values($skills)]);
        }
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],
            'department_id' => ['required', 'exists:departments,id'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'department_id.required' => 'Please select a department.',
            'department_id.exists' => 'Selected department does not exist.',
            'skills.*.exists' => 'One or more selected skills are invalid.',
        ];
    }
}
