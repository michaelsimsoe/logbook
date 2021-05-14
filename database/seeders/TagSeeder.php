<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'php'
        ]);

        Tag::create([
            'name' => 'javascript'
        ]);

        Tag::create([
            'name' => 'react'
        ]);

        Tag::create([
            'name' => 'database'
        ]);

        Tag::create([
            'name' => 'sql'
        ]);

        Tag::create([
            'name' => 'aws'
        ]);

        Tag::create([
            'name' => 'ux'
        ]);

        Tag::create([
            'name' => 'design'
        ]);

        Tag::create([
            'name' => 'composer'
        ]);

        Tag::create([
            'name' => 'docker'
        ]);
    }
}
