<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'module_id' => Module::all()->random()->id,
            'name' => fake()->words(3, true),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->sentence(4),
            'video' => fake()->unique()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
