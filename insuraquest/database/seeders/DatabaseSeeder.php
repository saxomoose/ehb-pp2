<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;

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
            'name' => 'gebruiker',
            'email' => 'gebruiker@example.com',
            'password' => '123456',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'type' => 'admin',
        ]);

         \App\Models\User::factory(45)->create();


    }
}
