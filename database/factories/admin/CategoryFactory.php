<?php

namespace Database\Factories\admin;
use Illuminate\Support\Str as Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Category>
 */
class CategoryFactory extends Factory
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
            'name'        => $name,
            'slug'        => $slug,
            'description' => $this->faker->sentence(),

        ];
    }
}
