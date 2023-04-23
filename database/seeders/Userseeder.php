<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => "admin@example.com",
                'password' => Hash::make('12345')
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'admin1',
                'email' => "admin1@example.com",
                'password' => Hash::make('12345')
            ],
        );
    }
}
