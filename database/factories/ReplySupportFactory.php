<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\User;
use Database\Seeders\SupportSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReplySupport>
 */
class ReplySupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();
        $support = $this->createSupportForUser($user->id);

        return [
            'support_id' => $support->id,
            'user_id' => $user->id,
            'description' => fake()->sentence(7),
        ];
    }

    private function createSupportForUser($userId)
    {
        return Support::factory()->create([
            'user_id' => $userId
        ]);
    }
}
