<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //? Creamos los roles
        $name1 = 'Super Administrador';
        $name2 = 'Administrador';
        $name3 = 'Redactor';
        $name4 = 'Colaborador';
        // $name5 = 'Soporte';
        $rol1 = Role::create(['name' => $name1, 'slug' => Str::slug($name1)]);
        $rol2 = Role::create(['name' => $name2, 'slug' => Str::slug($name2)]);
        $rol3 = Role::create(['name' => $name3, 'slug' => Str::slug($name3)]);
        $rol4 = Role::create(['name' => $name4, 'slug' => Str::slug($name4)]);
        // $rol5 = Role::create(['name' => $name5, 'slug' => Str::slug($name5)]);

        //? Creamos los permisos
        Permission::create(['name' => 'dashboard', 'description' => 'Ver dashboard'])->syncRoles([$rol1, $rol2, $rol3, $rol4]);

        // Permission::create(['name' => 'roles-usuarios','description'=>''])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'roles-usuarios.index', 'description' => 'Ver usuarios'])->syncRoles([$rol1]);
        Permission::create(['name' => 'roles-usuarios.edit', 'description' => 'Asignar rol'])->syncRoles([$rol1]);
        // Permission::create(['name' => 'roles-usuarios.update','description'=>''])->syncRoles([$rol1]);

        Permission::create(['name' => 'categorias', 'description' => 'Ver categorías'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'categorias.editar', 'description' => 'Editar categoría'])->syncRoles([$rol1]);
        Permission::create(['name' => 'categorias.eliminar', 'description' => 'Eliminar categoría'])->syncRoles([$rol1]);
        Permission::create(['name' => 'categorias.nuevo', 'description' => 'Crear categoría'])->syncRoles([$rol1]);

        Permission::create(['name' => 'etiquetas.index', 'description' => 'Ver etiquetas'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'etiquetas.create', 'description' => 'Crear etiqueta'])->syncRoles([$rol1]);
        Permission::create(['name' => 'etiquetas.edit', 'description' => 'Editar etiqueta'])->syncRoles([$rol1]);
        Permission::create(['name' => 'etiquetas.destroy', 'description' => 'Eliminar etiqueta'])->syncRoles([$rol1]);

        Permission::create(['name' => 'posts.index', 'description' => 'Ver posts'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posts.create', 'description' => 'Crear post'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posts.edit', 'description' => 'Editar post'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posts.destroy', 'description' => 'Eliminar post'])->syncRoles([$rol1, $rol2]);

        Permission::create(['name' => 'usuarios.index', 'description' => 'Ver registrados'])->syncRoles([$rol1]);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar registrado'])->syncRoles([$rol1]);
        Permission::create(['name' => 'usuarios.update', 'description' => 'Actualizar registrado'])->syncRoles([$rol1]);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar registrado'])->syncRoles([$rol1]);
    }
}