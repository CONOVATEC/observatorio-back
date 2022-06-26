<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\YouthPolicy>
 */
class YouthPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->unique->sentence(2);
        $slug=Str::slug($name);
        return [
            'name'        => $name,
            'slug'         =>$slug,
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
