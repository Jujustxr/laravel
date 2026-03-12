<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->get();
        $skills   = Skill::orderBy('order')->get();

        $about = [
            'meta_title' => 'About Me',
            'nav' => [
                'logo_text' => 'Juli',
                'logo_accent' => '.',
                'links' => [
                    ['label' => 'About', 'href' => '#about'],
                    ['label' => 'Skills', 'href' => '#skills'],
                    ['label' => 'Projects', 'href' => '#projects'],
                    ['label' => 'Contact', 'href' => '#contact'],
                ],
                'cta_label' => 'Hire Me',
                'cta_href' => '#contact',
            ],
            'hero' => [
                'tag' => 'Available for Work',
                'title_line_1' => 'Halo, Saya',
                'title_line_2' => 'Juli Ayu Audia',
                'description' => 'Front-End developer yang bersemangat membangun pengalaman digital yang bermakna. Penuh minat untuk terus belajar di banyak bidang.',
                'primary_cta_label' => 'Lihat Project',
                'primary_cta_href' => '#projects',
                'secondary_cta_label' => 'Hubungi Saya',
                'secondary_cta_href' => '#contact',
                'avatar_alt' => 'Foto Profil',
                'avatar_initials' => 'JA',
            ],
            'stats' => [
                ['number' => '1+', 'label' => 'Tahun Pengalaman'],
                ['number' => '10+', 'label' => 'Project Selesai'],
                ['number' => '10+', 'label' => 'Klien Puas'],
                ['number' => '∞', 'label' => 'Semangat Belajar'],
            ],
            'skills_section' => [
                'label' => 'Keahlian',
                'title_line_1' => 'Tech Stack &',
                'title_line_2' => 'Kemampuan Saya',
            ],
            'projects_section' => [
                'label' => 'Portfolio',
                'title_line_1' => 'Project yang',
                'title_line_2' => 'Pernah Saya Buat',
            ],
            'contact' => [
                'label' => 'Kontak',
                'title_line_1' => 'Mari Saling',
                'title_line_2' => 'Terhubung!',
                'subtitle' => 'Terbuka untuk peluang freelance, kolaborasi, atau sekadar ngobrol soal teknologi.',
                'social_links' => [
                    ['label' => 'Email', 'href' => 'mailto:juliayuaudia@gmail.com'],
                    ['label' => 'GitHub', 'href' => 'https://github.com/Jujustxr'],
                    ['label' => 'LinkedIn', 'href' => 'https://linkedin.com/in/JuliAyuAudia'],
                    ['label' => 'Instagram', 'href' => 'https://instagram.com/juliiayd'],
                ],
            ],
            'footer_name' => 'Juli Ayu Audia',
        ];

        return view('about', compact('projects', 'skills', 'about'));
    }
}