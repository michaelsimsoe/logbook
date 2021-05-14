<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Note;
use App\Models\NoteType;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::factory(100)
        // ->has(Comment::factory()->count(rand(0, 8)))
        ->create([
            'user_id' => 1,
            'note_types_id' => rand(1, 2),
        ])->each(function ($note) {
            $tag = Tag::all()->random(rand(2, 10))->pluck('id');
            $note->tags()->attach($tag);
            $comments = Comment::factory(rand(0, 8))->make();
            foreach ($comments as $comment) {
                $note->comments()->create(['body' => $comment->body]);
            }
        });

        Note::factory(100)
            ->for(User::factory()->create())
            ->for(NoteType::factory()->create(['user_id' => 2]))
            ->hasAttached(Tag::factory(rand(1, 8))->create())
            ->create();
        Note::factory(100)
            ->for(User::factory()->create())
            ->for(NoteType::factory()->create(['user_id' => 2]))
            ->hasAttached(Tag::factory(rand(1, 8))->create())
            ->create();
        Note::factory(100)
            ->for(User::factory()->create())
            ->for(NoteType::factory()->create(['user_id' => 2]))
            ->hasAttached(Tag::factory(rand(1, 8))->create())
            ->create();
    }
}
