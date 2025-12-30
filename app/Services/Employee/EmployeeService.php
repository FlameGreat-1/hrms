<?php

namespace App\Services\Employee;

use App\Models\Employee\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    public function getAllEmployees(): LengthAwarePaginator
    {
        return Employee::with(['department', 'skills'])
            ->orderBy('first_name')
            ->paginate(10);
    }

    public function getEmployeesByDepartment(int $departmentId): Collection
    {
        return Employee::with(['department', 'skills'])
            ->where('department_id', $departmentId)
            ->orderBy('first_name')
            ->get();
    }

    public function createEmployee(array $data): Employee
    {
        $employee = Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'department_id' => $data['department_id'],
        ]);

        if (isset($data['skills']) && is_array($data['skills'])) {
            $skills = array_values(array_filter($data['skills'], function($value) {
                return !is_null($value) && $value !== '' && is_numeric($value);
            }));
            
            if (!empty($skills)) {
                $employee->skills()->sync($skills);
            }
        }

        return $employee->load(['department', 'skills']);
    }

    public function updateEmployee(Employee $employee, array $data): Employee
    {
        $employee->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'department_id' => $data['department_id'],
        ]);

        if (isset($data['skills']) && is_array($data['skills'])) {
            $skills = array_values(array_filter($data['skills'], function($value) {
                return !is_null($value) && $value !== '' && is_numeric($value);
            }));
            
            if (!empty($skills)) {
                $employee->skills()->sync($skills);
            } else {
                $employee->skills()->sync([]);
            }
        } else {
            $employee->skills()->sync([]);
        }

        return $employee->load(['department', 'skills']);
    }

    public function deleteEmployee(Employee $employee): bool
    {
        return $employee->delete();
    }

    public function getEmployeeById(int $id): Employee
    {
        return Employee::with(['department', 'skills'])->findOrFail($id);
    }

    public function checkEmailUniqueness(string $email, ?int $excludeId = null): bool
    {
        $query = Employee::where('email', $email);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return !$query->exists();
    }
}