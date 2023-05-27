<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('news');
        Storage::makeDirectory('news');
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\admin\Category::factory(1)->create();
        \App\Models\admin\Tag::factory(1)->create();
        \App\Models\admin\AboutCmpj::factory(1)->create();
        \App\Models\admin\TypeLogo::factory(1)->create();
        \App\Models\admin\ReaderLog::factory(1)->create();
        \App\Models\admin\Setting::factory(1)->create();
        $this->call(PostSeeder::class);
        // \App\Models\admin\Like::factory(1)->create();
        \App\Models\admin\TypeTraining::factory(1)->create();
        \App\Models\admin\Training::factory(1)->create();
        \App\Models\admin\YouthObservatory::factory(1)->create();
        \App\Models\admin\YouthPolicy::factory(1)->create();
        \App\Models\admin\YouthStrategy::factory(1)->create();
        \App\Models\admin\Position::factory(1)->create();
        \App\Models\admin\Directive::factory(1)->create();
        \App\Models\admin\Slide::factory(1)->create();
        \App\Models\admin\Logo::factory(2)->create();

       // \App\Models\admin\Thematic::factory(3)->create();
        $this->call(LogoSeeder::class);
    }
}
