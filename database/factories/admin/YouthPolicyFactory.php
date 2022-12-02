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
        return [
            'name'        => $name,
            'description' => $this->faker->sentence(),
            'url_image' => $this->faker->url(),
            'link_video' =>$this->faker->url(),
            'link_drive' => $this->faker->url()
        ];
    }
}
