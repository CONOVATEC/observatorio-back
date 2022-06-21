<?php

namespace Database\Factories\admin;

use App\Models\admin\TypeTraining;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->unique->sentence(2),
            'description' => $this->faker->sentence(),
            'type_training_id' => TypeTraining::all()->random()->id,


        ];
    }
}
