<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'Flower Gift',
                'description' => 'Proyek yang menghasilkan bunga animasi menggunakan kode, dirancang sebagai hadiah digital unik untuk seseorang yang spesial.',
                'emoji'       => '🌸',
                'tags'        => ['JavaScript', 'SCSS', 'HTML'],
                'github'      => 'https://github.com/Jujustxr',
            ],
            [
                'title'       => 'Moodify',
                'description' => 'Aplikasi pencatatan suasana hati dengan visualisasi data menarik dan rekomendasi kegiatan oleh AI.',
                'emoji'       => '📊',
                'tags'        => ['Node.js', 'Tailwind', 'TypeScript'],
                'github'      => 'https://github.com/Jujustxr',
            ],
            [
                'title'       => 'NetPulse',
                'description' => 'Aplikasi network packet sniffer untuk memantau lalu lintas data pada jaringan komputer secara real-time.',
                'emoji'       => '🔍',
                'tags'        => ['Wireshark', 'Scapy', 'Npcap'],
                'github'      => 'https://github.com/Jujustxr',
            ],
            [
                'title'       => 'PhishGuard',
                'description' => 'Aplikasi deteksi phishing melalui analisis URL dan konten email.',
                'emoji'       => '🛡️',
                'tags'        => ['Wireshark', 'VirusTotal', 'Chrome'],
                'github'      => 'https://github.com/Jujustxr',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}