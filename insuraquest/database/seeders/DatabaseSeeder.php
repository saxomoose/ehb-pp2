<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@insuraquest.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'type' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'librarian',
            'email' => 'librarian@insuraquest.com',
            'password' => Hash::make('librarian'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'type' => 'librarian',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@insuraquest.com',
            'password' => Hash::make('user'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'type' => 'user',
        ]);

         \App\Models\User::factory(15)->create();


    }
}
