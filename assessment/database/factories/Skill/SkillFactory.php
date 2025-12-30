<?php

namespace Database\Factories\Skill;

use App\Models\Skill\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    protected $model = Skill::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
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
            ]),
        ];
    }
}
