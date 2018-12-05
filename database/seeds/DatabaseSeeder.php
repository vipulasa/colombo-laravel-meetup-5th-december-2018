<?php

use Illuminate\Database\Seeder;
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
        // $this->call(UsersTableSeeder::class);

        (new \App\User)->create([
            'name' => 'Laravel Tech Talk',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => str_random(10),
            'role' => 'administrator'
        ]);

        factory(\App\User::class, 10)->create();

        factory(\App\Post::class, 10)->create();
    }
}
