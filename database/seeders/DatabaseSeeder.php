<?php

namespace Database\Seeders;

use Database\Seeders\Department\DepartmentSeeder;
use Database\Seeders\Employee\EmployeeSeeder;
use Database\Seeders\Skill\SkillSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            SkillSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
