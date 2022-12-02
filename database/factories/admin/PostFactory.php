<?php

namespace Database\Factories\Admin;

use App\Models\admin\Category;
use App\Models\admin\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            $title=$this->faker->text(20);
            $slug=Str::slug($title);
            return [
                'title' => $title,
                'slug' =>$slug,
                'extract' => $this->faker->unique->word,
                'content' => $this->faker->paragraph(),
                'status' => $this->faker->numberBetween(1,2),
                'type_new' => $this->faker->numberBetween(1,2),
                'publicado' =>$this->faker->numberBetween(1,2),
                'tendencia_active'=> $this->faker->numberBetween(1,2),
                'news_cover' => $this->faker->numberBetween(1,2),
                'category_id'=> Category::all()->random()->id,
                'user_id' => User::all()->random()->id,

            ];

    }
}
