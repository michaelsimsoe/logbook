<?php

namespace Database\Factories;

use App\Models\NoteType;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NoteType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => rand(2, 11),
        ];
    }
}
