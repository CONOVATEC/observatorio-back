<?php

namespace Database\Seeders;

use App\Models\admin\Thematic;
use Illuminate\Database\Seeder;

class ThematicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thematic::factory(100)->create(); // Crea 10 registros ficticios

    }
}
