<?php

namespace Database\Factories\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dir = '/tmp';
        $width = 200;
        $height = 200;
        return [
            'name_entity' => $this->faker->name(),
            'url_image' => $this->faker->url(),
            'link_facebook' => $this->faker->url(),
            'link_instagram' => $this->faker->url(),
            'link_linkedin' => $this->faker->url(),
            'link_youtube' => $this->faker->url(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
