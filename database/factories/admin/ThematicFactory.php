<?php

namespace Database\Factories\admin;

use App\Models\admin\Thematic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Thematic>
 */
class ThematicFactory extends Factory
{
    protected $model = Thematic::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique->word,
            'description' => $this->faker->text,
            'url_icono' => $this->faker->imageUrl(),
        ];
    }
}
