<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->unique()->words(3, true);
        return [
            'module_id' => Module::all()->random()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(4),
            'video' => fake()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
