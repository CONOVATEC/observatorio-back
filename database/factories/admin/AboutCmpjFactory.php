<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\AboutCmpj>
 */
class AboutCmpjFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_cmpj' => $this->faker->company,
            'description_cmpj' => $this->faker->unique->sentence(),
            'title_assembly' => $this->faker->company,
            'description_assembly' => $this->faker->unique->sentence(),
            'title_directive' => $this->faker->company,
            'description_directive' => $this->faker->unique->sentence(),
            'link_video'=> $this->faker->url(),
            'link_drive'=>$this->faker->url()
        ];
    }
}
