<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'akbarhadi',
                'username' => 'akbarhadi',
                'email' => 'akbarhadi21@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'gilanghadi',
                'username' => 'gilanghadi',
                'email' => 'gilangsaputro987@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($user as $user) {
            User::create($user);
        }
    }
}
