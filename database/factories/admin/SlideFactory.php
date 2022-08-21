<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Slide>
 */
class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=$this->faker->text(20);
        return [
            'year' => $this->faker->year(),
            'title' => $title,
            'extract' => $this->faker->text(150),
            'status' => $this->faker->numberBetween(1,2)
        ];
    }
}
