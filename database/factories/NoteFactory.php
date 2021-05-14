<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\NoteType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeBetween('-1 week', '-2 days'),
        ];
    }
}
