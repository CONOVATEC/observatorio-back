<?php

namespace Database\Factories\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\YouthStrategy>
 */
class YouthStrategyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'theme' => $this->faker->word,
            'description' => $this->faker->paragraph(),
            'axes' =>  $this->faker->word,
            'imagen_theme' => $this->faker->imageUrl(),
            'imagen_infographic' => $this->faker->imageUrl(),
            'video_strategy' => $this->faker->url(),
            'user_id' =>User::all()->random()->id,
        ];
    }
}
