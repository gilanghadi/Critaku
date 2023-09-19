<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $topics = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
            ],
            [
                'name' => 'Css',
                'slug' => 'css',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
            ],
            [
                'name' => 'Javascript',
                'slug' => 'javascript',
            ],
            [
                'name' => 'Jquery',
                'slug' => 'jquery',
            ],
            [
                'name' => 'Mysql',
                'slug' => 'mysql',
            ],
            [
                'name' => 'MongoDB',
                'slug' => 'mongodb',
            ],
            [
                'name' => 'Oracle',
                'slug' => 'oracle',
            ],
            [
                'name' => 'NodeJS',
                'slug' => 'nodejs',
            ],
            [
                'name' => 'ReactJS',
                'slug' => 'reactjs',
            ],
            [
                'name' => 'ExpressJS',
                'slug' => 'expressjs',
            ],
            [
                'name' => 'VueJS',
                'slug' => 'vuejs',
            ],
            [
                'name' => 'AngularJS',
                'slug' => 'angularjs',
            ],
            [
                'name' => 'Spring',
                'slug' => 'springjs',
            ],
            [
                'name' => 'ViteJS',
                'slug' => 'vitejs',
            ],
            [
                'name' => 'General',
                'slug' => 'general',
            ],
            [
                'name' => 'Testing',
                'slug' => 'testing',
            ],
            [
                'name' => 'Livewire',
                'slug' => 'livewire',
            ],
            [
                'name' => 'Eloquent',
                'slug' => 'eloquent',
            ],
            [
                'name' => 'CodeReview',
                'slug' => 'codereview',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
            ],
            [
                'name' => 'Spark',
                'slug' => 'spark',
            ],
            [
                'name' => 'Git',
                'slug' => 'git',
            ],
            [
                'name' => 'Server',
                'slug' => 'server',
            ],
            [
                'name' => 'Application-security',
                'slug' => 'application-security',
            ],
            [
                'name' => 'Cloud-security',
                'slug' => 'cloud-security',
            ],
            [
                'name' => 'Kriptografi',
                'slug' => 'Kriptografi',
            ],
            [
                'name' => 'Keamanan-Infrastruktur',
                'slug' => 'keamanan-infrastruktur',
            ],
            [
                'name' => 'Respons-Insiden',
                'slug' => 'respons-insiden',
            ],
            [
                'name' => 'Manajemen-Kerentanan',
                'slug' => 'manajemen-kerentanan',
            ],
            [
                'name' => 'Mobile-Malware',
                'slug' => 'mobile-malware',
            ],
            [
                'name' => 'Pemerasan-Informasi',
                'slug' => 'pemerasan-informasi',
            ],
            [
                'name' => 'Malware',
                'slug' => 'malware',
            ],
            [
                'name' => 'Creativity',
                'slug' => 'creativity',
            ],
            [
                'name' => 'Decision-Making',
                'slug' => 'decision-making',
            ],
            [
                'name' => 'Habits',
                'slug' => 'habits',
            ],
            [
                'name' => 'Focus',
                'slug' => 'focus',
            ],
            [
                'name' => 'Motivation',
                'slug' => 'motivation',
            ],
            [
                'name' => 'Productivity',
                'slug' => 'productivity',
            ],
            [
                'name' => 'Self-Inprovement',
                'slug' => 'self-improvement',
            ],
        ];
        foreach ($topics as $topic) {
            \App\Models\Topic::create($topic);
        }
    }
}
