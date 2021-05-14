<?php

namespace Database\Seeders;

use App\Models\NoteType;
use Illuminate\Database\Seeder;

class NoteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoteType::create([
            'name' => 'Læring',
            'user_id' => 1
        ]);

        NoteType::create([
            'name' => 'Arbeid',
            'user_id' => 1
        ]);

        // NoteType::factory()->create();
    }
}
