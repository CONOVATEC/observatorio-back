<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->unique->word;
        $slug=Str::slug($name);
            return [
                'name'=> $name,
                'slug'=> $slug
            ];

    }
}
