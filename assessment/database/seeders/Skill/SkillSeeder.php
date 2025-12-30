<?php

namespace Database\Seeders\Skill;

use App\Models\Skill\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'React',
            'MySQL',
            'PostgreSQL',
            'Docker',
            'Git',
            'REST API',
            'GraphQL',
            'Redis',
            'AWS',
            'Linux',
            'Nginx',
            'TDD',
            'Agile',
            'Scrum',
            'Project Management',
            'Communication'
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
