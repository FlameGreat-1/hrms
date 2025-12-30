<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Services\Skill\SkillService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function __construct(
        protected SkillService $skillService
    ) {}

    public function index(): View
    {
        $skills = $this->skillService->getAllSkills();

        return view('skills.index', compact('skills'));
    }

    public function create(): View
    {
        return view('skills.create');
    }

    public function store(StoreSkillRequest $request): RedirectResponse
    {
        $this->skillService->createSkill($request->validated());

        return redirect()->route('skills.index')
            ->with('success', 'Skill created successfully.');
    }
}
