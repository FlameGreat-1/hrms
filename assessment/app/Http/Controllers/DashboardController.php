<?php

namespace App\Http\Controllers;

use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Models\Skill\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_employees' => Employee::count(),
            'total_departments' => Department::count(),
            'total_skills' => Skill::count(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
