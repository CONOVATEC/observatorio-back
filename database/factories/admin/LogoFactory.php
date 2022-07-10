<?php

namespace Database\Factories\admin;

use App\Models\admin\TypeLogo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Logo>
 */
class LogoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'social_media' => $this->faker->url(),
            'type_logo_id' =>  TypeLogo::all()->random()->id,

        ];
    }
}
