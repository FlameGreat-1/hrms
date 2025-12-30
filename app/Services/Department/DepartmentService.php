<?php

namespace App\Services\Department;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Collection;

class DepartmentService
{
    public function getAllDepartments(): Collection
    {
        return Department::orderBy('name')->get();
    }

    public function createDepartment(array $data): Department
    {
        return Department::create($data);
    }

    public function getDepartmentById(int $id): ?Department
    {
        return Department::findOrFail($id);
    }
}
