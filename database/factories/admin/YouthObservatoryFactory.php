<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\YouthObservatory>
 */
class YouthObservatoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mission' => $this->faker->unique->text(100),
            'vision' =>$this->faker->unique->text(100),
            'about_us' =>$this->faker->unique->text(100),
            'url_organization_chart' => $this->faker->url(),

        ];
    }
}
