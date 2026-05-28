<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Backend & Database
            ['name' => 'Laravel', 'percentage' => 90, 'category' => 'Backend'],
            ['name' => 'PHP', 'percentage' => 85, 'category' => 'Backend'],
            ['name' => 'MySQL', 'percentage' => 80, 'category' => 'Backend'],
            // Frontend
            ['name' => 'HTML', 'percentage' => 90, 'category' => 'Frontend'],
            ['name' => 'CSS', 'percentage' => 88, 'category' => 'Frontend'],
            ['name' => 'JavaScript', 'percentage' => 82, 'category' => 'Frontend'],
            ['name' => 'React.js', 'percentage' => 78, 'category' => 'Frontend'],
            ['name' => 'Vue.js', 'percentage' => 85, 'category' => 'Frontend'],
            ['name' => 'Tailwind CSS', 'percentage' => 88, 'category' => 'Frontend'],
            ['name' => 'Alpine.js', 'percentage' => 82, 'category' => 'Frontend'],
            ['name' => 'GSAP', 'percentage' => 82, 'category' => 'Frontend'],
            // Tools
            ['name' => 'Git', 'percentage' => 88, 'category' => 'Tools'],
            ['name' => 'GitHub', 'percentage' => 88, 'category' => 'Tools'],
            ['name' => 'Gemini', 'percentage' => 75, 'category' => 'Tools'],
            ['name' => 'Antigravity', 'percentage' => 85, 'category' => 'Tools'],
            // AI & Technology
            ['name' => 'Prompt Engineering', 'percentage' => 85, 'category' => 'AI & Technology'],
            ['name' => 'AI Tools Usage', 'percentage' => 82, 'category' => 'AI & Technology'],
            ['name' => 'IoT Systems', 'percentage' => 82, 'category' => 'AI & Technology'],
            // Software Engineering
            ['name' => 'Problem Solving', 'percentage' => 85, 'category' => 'Software Engineering'],
            ['name' => 'Team Collaboration', 'percentage' => 88, 'category' => 'Software Engineering'],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }
    }
}
