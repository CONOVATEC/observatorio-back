<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\AboutCmpj>
 */
class AboutCmpjFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ordinance' => $this->faker->company,
            'about_us' => $this->faker->unique->word,
            'vision' => $this->faker->unique->word,
            'functions' => $this->faker->unique->word,
            'board_of_directors'=> $this->faker->company,
            'social'=> $this->faker->unique()->numberBetween(1,40),
        ];
    }
}
