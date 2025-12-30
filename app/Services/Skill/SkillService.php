<?php

namespace App\Services\Skill;

use App\Models\Skill\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillService
{
    public function getAllSkills(): Collection
    {
        return Skill::orderBy('name')->get();
    }

    public function createSkill(array $data): Skill
    {
        return Skill::create($data);
    }

    public function getSkillById(int $id): ?Skill
    {
        return Skill::findOrFail($id);
    }
}
