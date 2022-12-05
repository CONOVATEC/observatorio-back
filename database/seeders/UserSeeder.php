<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Administrador',
                'phone' => '935445249',
                'status' => 2,
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now()
            ]
        )->assignRole('Super Administrador');
        User::create(
            [
                'name' => 'Cybert coder',
                'phone' => '935445248',
                'status' => 2,
                'username' => 'cybert22',
                'email' => 'cybert@coder.com',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now()
            ]
        )->assignRole('Colaborador');
        // User::factory(20)->create();
    }
}
