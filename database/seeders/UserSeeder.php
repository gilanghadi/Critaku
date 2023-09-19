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
                'name' => 'gilang',
                'username' => 'gilanghadi',
                'email' => 'gilanghadi@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cecep',
                'username' => 'cecephadi',
                'email' => 'cecep@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
