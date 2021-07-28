<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'user_name' => 'admin',
            'email' => 'niharranjandasmu@gmail.com',
            'password' => Hash::make('12345678'),
            'user_role' => 1,
            'registered_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'api_token' => Str::random(60)
        ]);
    }
}
