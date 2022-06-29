<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
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
        Storage::deleteDirectory('public/news');
        Storage::makeDirectory('public/news');
        \App\Models\User::factory()->create(['name' => 'Administrador', 'phone' => '935445249', 'status' => 2, 'username' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin123')]);
        \App\Models\User::factory(100)->create();
        \App\Models\admin\Category::factory(100)->create();
        \App\Models\admin\Tag::factory(10)->create();
        // \App\Models\admin\AboutCmpj::factory(10)->create();
        \App\Models\admin\TypeLogo::factory(10)->create();
        \App\Models\admin\Logo::factory(10)->create();
        \App\Models\admin\ReaderLog::factory(20)->create();
        \App\Models\admin\Setting::factory(1)->create();
        $this->call(RoleSeeder::class);
        $this->call(PostSeeder::class);
        \App\Models\admin\Like::factory(10)->create();
        \App\Models\admin\TypeTraining::factory(10)->create();
        \App\Models\admin\Training::factory(10)->create();
        \App\Models\admin\YouthObservatory::factory(10)->create();
        \App\Models\admin\YouthPolicy::factory(10)->create();
        \App\Models\admin\YouthStrategy::factory(10)->create();
    }
}