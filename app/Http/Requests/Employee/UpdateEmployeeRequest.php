<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('skills')) {
            $skills = $this->input('skills');
            
            if (is_string($skills)) {
                $skills = explode(',', trim($skills, ','));
            }
            
            if (is_array($skills)) {
                $skills = array_filter($skills, function($value) {
                    return !is_null($value) && $value !== '' && $value !== 'null';
                });
                $skills = array_values($skills);
            }
            
            $this->merge(['skills' => $skills ?: []]);
        }
    }

    public function rules(): array
    {
        $employee = $this->route('employee');
        $employeeId = $employee ? $employee->id : null;

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employees', 'email')->ignore($employeeId)
            ],
            'department_id' => ['required', 'exists:departments,id'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['integer', 'exists:skills,id'],
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