<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function testUserCanCreateNote()
    {
        $attributes = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'type' => 'learning',
            'tags' => 'sql',
        ];


        $this->post('/notes', $attributes);

        $this->assertDatabaseHas('notes', $attributes);
    }

    public function testNoteRequiresTitle()
    {
        $attributes = \App\Models\Note::factory()->raw(['title' => '']);

        $this->post('/notes', $attributes)->assertSessionHasErrors('title');
    }

    public function testNoteRequiresBody()
    {
        $attributes = \App\Models\Note::factory()->raw(['body' => '']);

        $this->post('/notes', $attributes)->assertSessionHasErrors('body');
    }

    public function testNoteRequiresType()
    {
        $attributes = \App\Models\Note::factory()->raw(['type' => '']);

        $this->post('/notes', $attributes)->assertSessionHasErrors('type');
    }
}
