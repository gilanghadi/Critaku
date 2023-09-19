<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Programming',
                'slug' => 'programing',
            ],
            [
                'name' => 'Cybersecurity',
                'slug' => 'cyber-security',
            ],
            [
                'name' => 'Server',
                'slug' => 'server',
            ],
            [
                'name' => 'Article',
                'slug' => 'article',
            ],
            [
                'name' => 'Personal',
                'slug' => 'personal',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
            ],
            [
                'name' => 'Biografi',
                'slug' => 'biografi',
            ],
            [
                'name' => 'Sejarah',
                'slug' => 'sejarah',
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
            ],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
