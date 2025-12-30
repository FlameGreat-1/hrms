<?php

namespace Database\Factories\Department;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Human Resources',
                'Engineering',
                'Marketing',
                'Sales',
                'Finance',
                'Operations',
                'Customer Support',
                'Product Management',
                'Quality Assurance',
                'Research & Development'
            ]),
        ];
    }
}
