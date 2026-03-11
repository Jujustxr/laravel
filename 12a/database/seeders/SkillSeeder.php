<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Backend',       'description' => 'Python, Flask, Django untuk API yang cepat dan scalable.',                          'level' => 85, 'order' => 1],
            ['name' => 'Frontend',      'description' => 'Frontend interaktif dengan Vue 3 Composition API, Pinia, dan Vite.',                'level' => 78, 'order' => 2],
            ['name' => 'Database',      'description' => 'MySQL, PostgreSQL, query optimization, dan database design yang efisien.',          'level' => 80, 'order' => 3],
            ['name' => 'UI/UX Design',  'description' => 'Figma, Tailwind CSS, desain responsif berpusat pada pengalaman pengguna.',          'level' => 70, 'order' => 4],
            ['name' => 'DevOps',        'description' => 'Docker untuk aplikasi dalam container yang fleksibel dan mudah.',                   'level' => 65, 'order' => 5],
            ['name' => 'Cyber Security','description' => 'Wireshark, Metasploit, dan praktik keamanan dasar untuk melindungi aplikasi.',      'level' => 60, 'order' => 6],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}