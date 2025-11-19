<?php

namespace Database\Factories\HelpBoard\Models;

use App\HelpBoard\Models\HelpPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HelpPost>
 */
class HelpPostFactory extends Factory
{
    protected $model = HelpPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(2),
            'type' => $this->faker->randomElement(['help_request','help_offer']),
            'location' => $this->faker->city(),
            //'status' => $this->faker->randomElement(['pending','active','resolved']),
            //'user_id' => User::factory()
        ];
    }
}
