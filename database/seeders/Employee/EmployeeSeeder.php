<?php

namespace Database\Seeders\Employee;

use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Models\Skill\Skill;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();
        $skills = Skill::all();

        foreach ($departments as $department) {
            Employee::factory(5)->create([
                'department_id' => $department->id,
            ])->each(function ($employee) use ($skills) {
                $employee->skills()->attach(
                    $skills->random(rand(2, 5))->pluck('id')->toArray()
                );
            });
        }
    }
}
