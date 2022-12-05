<?php

namespace Database\Factories\admin;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\YouthStrategy>
 */
class YouthStrategyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->sentence();
        return [
            'name' => $name,
            'link_drive' => $this->faker->url(),
            'link_youtube' => $this->faker->url(),
            'url_image' => $this->faker->url(),
        ];
    }
}
