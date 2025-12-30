<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee\Employee;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use App\Services\Skill\SkillService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function __construct(
        protected EmployeeService $employeeService,
        protected DepartmentService $departmentService,
        protected SkillService $skillService
    ) {}

    public function index(): View
    {
        $employees = $this->employeeService->getAllEmployees();
        $departments = $this->departmentService->getAllDepartments();

        return view('employees.index', compact('employees', 'departments'));
    }

    public function create(): View
    {
        $departments = $this->departmentService->getAllDepartments();
        $skills = $this->skillService->getAllSkills();

        return view('employees.create', compact('departments', 'skills'));
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        if (isset($data['skills']) && is_array($data['skills'])) {
            $data['skills'] = array_filter($data['skills'], fn($val) => !is_null($val) && $val !== '');
            $data['skills'] = array_values($data['skills']);
        }
        
        $this->employeeService->createEmployee($data);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee): View
    {
        $employee = $this->employeeService->getEmployeeById($employee->id);

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        $employee = $this->employeeService->getEmployeeById($employee->id);
        $departments = $this->departmentService->getAllDepartments();
        $skills = $this->skillService->getAllSkills();

        return view('employees.edit', compact('employee', 'departments', 'skills'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $data = $request->validated();
        
        if (isset($data['skills']) && is_array($data['skills'])) {
            $data['skills'] = array_filter($data['skills'], fn($val) => !is_null($val) && $val !== '');
            $data['skills'] = array_values($data['skills']);
        }
        
        $this->employeeService->updateEmployee($employee, $data);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $this->employeeService->deleteEmployee($employee);

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }

    public function filter(Request $request): JsonResponse
    {
        $departmentId = $request->input('department_id');

        if (!$departmentId) {
            $employees = Employee::with(['department', 'skills'])->get();
        } else {
            $employees = Employee::with(['department', 'skills'])
                ->where('department_id', $departmentId)
                ->get();
        }

        return response()->json([
            'employees' => $employees,
        ]);
    }

    public function checkEmail(Request $request): JsonResponse
    {
        $email = $request->input('email');
        $employeeId = $request->input('employee_id');

        $isUnique = $this->employeeService->checkEmailUniqueness($email, $employeeId);

        return response()->json([
            'available' => $isUnique,
        ]);
    }
}
