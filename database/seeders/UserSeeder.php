<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
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
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$.NG4aUEG3IV6ZUmBWGjoT.y1jUuLBcxY0WI6yihUTuwUWwd4E/v0K', // password
            'remember_token' => Str::random(10),
        ]);

        // User::factory(10)->create();
    }
}
