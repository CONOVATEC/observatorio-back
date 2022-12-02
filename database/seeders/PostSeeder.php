<?php

namespace Database\Seeders;

use App\Models\admin\Image;
use App\Models\admin\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts= Post::factory(2)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
            $post->tags()->attach([rand(1, 1), rand(1, 1)]);
        }
    }
}
