<?php

namespace Database\Seeders;

use App\Models\admin\Image;
use App\Models\admin\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news= News::factory(20)->create();

        foreach ($news as $new) {
            Image::factory(1)->create([
                'imageable_id' => $new->id,
                'imageable_type' => News::class,
            ]);
            $new->tags()->attach([rand(1, 4), rand(5, 7)]);
        }
    }
}
