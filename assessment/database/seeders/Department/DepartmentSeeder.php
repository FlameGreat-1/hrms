<?php

namespace Database\Seeders\Department;

use App\Models\Department\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Human Resources',
            'Engineering',
            'Marketing',
            'Sales',
            'Finance',
            'Operations',
            'Customer Support',
            'Product Management'
        ];

        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
