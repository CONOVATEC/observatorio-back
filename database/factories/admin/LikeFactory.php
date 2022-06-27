<?php

namespace Database\Factories\admin;

use App\Models\admin\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reaction'=> $this->faker->numberBetween(1,2),
            'post_id'=> Post::all()->random()->id,
            'user_id'=> User::all()->random()->id,

        ];
    }
}
