<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => env('SEEDER_MANAGER_NAME', 'John Doe'),
                'email' => env('SEEDER_MANAGER_EMAIl', 'John Doe'),
                'email_verified_at' => now(),
                'password' => Hash::make(env('SEEDER_MANAGER_PASSWORD', 'password')),
                'role_id' => 0,
            ],
        ]);
    }
}
