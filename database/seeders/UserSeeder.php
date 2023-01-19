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
                'name' => config('app.SEEDER_MANAGER_NAME'),
                'email' => config('app.SEEDER_MANAGER_EMAIl'),
                'email_verified_at' => now(),
                'password' => Hash::make(config('app.SEEDER_MANAGER_PASSWORD')),
                'role_id' => 0,
            ],
        ]);
    }
}
