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
                'status' => $this->faker->randomElement(['1', '2']),
                'position_id' =>Position::all()->random()->id,
            ];
    }
}
