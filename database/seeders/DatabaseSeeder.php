<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


      Storage::deleteDirectory('public/news');
        Storage::makeDirectory('public/news');

        \App\Models\User::factory(100)->create();

        \App\Models\admin\Category::factory(100)->create();
        \App\Models\admin\AboutCmpj::factory(10)->create();
        \App\Models\admin\Like::factory(2)->create();
        \App\Models\admin\TypeLogo::factory(10)->create();
        \App\Models\admin\Logo::factory(10)->create();

        \App\Models\admin\ReaderLog::factory(20)->create();
        \App\Models\admin\Setting::factory(1)->create();
        \App\Models\admin\Tag::factory(10)->create();
        $this->call(PostSeeder::class);
        \App\Models\admin\TypeTraining::factory(10)->create();
        \App\Models\admin\Training::factory(10)->create();
        \App\Models\admin\YouthObservatory::factory(10)->create();
        \App\Models\admin\YouthPolicy::factory(10)->create();
        \App\Models\admin\YouthStrategy::factory(10)->create();
        \App\Models\admin\YouthStrategy::factory(10)->create();

    }
    }

