<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\ReaderLog>
 */
class ReaderLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'dates_of_birth' => $this->faker->date(),
            'comment' => $this->faker->unique->text(40),

        ];
    }
}
