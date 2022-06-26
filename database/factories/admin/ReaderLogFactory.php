<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

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
        $name= $this->faker->name();
        $slug=Str::slug($name);
        return [
            'name' =>$name,
            'slug' => $slug,
            'last_name' => $this->faker->lastName(),
            'dates_of_birth' => $this->faker->date(),
            'comment' => $this->faker->unique->text(40),

        ];
    }
}
