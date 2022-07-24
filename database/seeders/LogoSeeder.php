<?php

namespace Database\Seeders;

use App\Models\admin\Image;
use App\Models\admin\Logo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logos= Logo::factory(10)->create();

        foreach ($logos as $logo) {
            Image::factory(1)->create([
                'imageable_id' => $logo->id,
                'imageable_type' => Logo::class,
            ]);

        }
    }
}
