<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $qa = ['P','Q','A'];

        return [
            'lesson_id' => Lesson::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'qa' => $qa[array_rand($qa, 1)],
            'description' => fake()->sentence(14),
        ];
    }
}
