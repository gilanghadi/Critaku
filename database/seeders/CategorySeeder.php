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
        DB::table('categories')->insert(
            [
                'name' => 'programing',
                'slug' => 'programing',
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'personal',
                'slug' => 'personal',
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'design',
                'slug' => 'design',
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'biografi',
                'slug' => 'biografi',
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'sejarah',
                'slug' => 'sejarah',
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'other',
                'slug' => 'other',
            ],
        );
    }
}
