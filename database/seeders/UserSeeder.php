<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'role' => 1,
            'password' => Hash::make('password'),
            'session_id' => null,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'kitchen',
            'role' => 3,
            'password' => Hash::make('password'),
            'session_id' => null,
            'remember_token' => Str::random(10),
        ]);
    }
}
