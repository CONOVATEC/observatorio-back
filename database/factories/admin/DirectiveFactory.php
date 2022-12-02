<?php

namespace Database\Factories\admin;

use App\Models\admin\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DirectiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            return [
                'name'=> $this->faker->unique()->username(),
                'status' =>$this->faker->numberBetween(1,2),
                'url_image' => $this->faker->url(),
                'position_id' =>Position::all()->random()->id,
            ];
    }
}
