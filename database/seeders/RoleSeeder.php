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
        $name3 = 'Editor';
        $name4 = 'Colaborador';
        // $name5 = 'Soporte';
        $rol1 = Role::create(['name' => $name1, 'slug' => Str::slug($name1)]);
        $rol2 = Role::create(['name' => $name2, 'slug' => Str::slug($name2)]);
        $rol3 = Role::create(['name' => $name3, 'slug' => Str::slug($name3)]);
        $rol4 = Role::create(['name' => $name4, 'slug' => Str::slug($name4)]);
        // $rol5 = Role::create(['name' => $name5, 'slug' => Str::slug($name5)]);

        //? Creamos los permisos
        Permission::create(['name' => 'dashboard', 'description' => 'Ver dashboard'])->syncRoles([$rol1, $rol2, $rol3, $rol4]);
        Permission::create(['name' => '/', 'description' => 'Ver web'])->syncRoles([$rol1, $rol2, $rol3, $rol4]);

        //* Roles para juvenilesObservatorio
        Permission::create(['name' => 'observatorioJuvenil.index', 'description' => 'Ver observatorio Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'observatorioJuvenil.create', 'description' => 'Crear observatorio Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'observatorioJuvenil.edit', 'description' => 'Editar observatorio Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'observatorioJuvenil.destroy', 'description' => 'Eliminar observatorio Juvenil'])->syncRoles([$rol1, $rol2]);
        //* Roles para sobreCmpj
        Permission::create(['name' => 'sobreCmpj.index', 'description' => 'Ver CMPJ'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'sobreCmpj.create', 'description' => 'Crear CMPJ'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'sobreCmpj.edit', 'description' => 'Editar CMPJ'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'sobreCmpj.destroy', 'description' => 'Eliminar CMPJ'])->syncRoles([$rol1, $rol2]);
        //* Roles para noticias
        Permission::create(['name' => 'noticias.index', 'description' => 'Ver noticias'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'noticias.create', 'description' => 'Crear noticias'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'noticias.edit', 'description' => 'Editar noticias'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'noticias.destroy', 'description' => 'Eliminar noticias'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'noticias.eliminar.definitivo', 'description' => 'Eliminar definitivo Noticias'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'noticias.restaurar', 'description' => 'Restaurar noticias eliminados'])->syncRoles([$rol1, $rol2]);
        //* Roles para Usuarios
        Permission::create(['name' => 'usuarios.index', 'description' => 'Ver Usuarios'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuarios.create', 'description' => 'Crear Usuarios'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar Usuarios'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuarios.eliminar.definitivo', 'description' => 'Eliminar definitivo Usuarios'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuarios.restaurar', 'description' => 'Restaurar Usuarios eliminados'])->syncRoles([$rol1, $rol2]);
        //* Roles para Usuarios-perfil
        Permission::create(['name' => 'usuarios.actualizar.perfil', 'description' => 'Actualizar perfil'])->syncRoles([$rol1, $rol2, $rol3, $rol4]);
        Permission::create(['name' => 'usuarios.show', 'description' => 'Ver perfil'])->syncRoles([$rol1, $rol2, $rol3, $rol4]);
        //* Roles para Categorías
        Permission::create(['name' => 'categorias.index', 'description' => 'Ver categorías'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.create', 'description' => 'Crear categorías'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.edit', 'description' => 'Editar categorías'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.eliminar.definitivo', 'description' => 'Eliminar definitivo categorías'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'categorias.restaurar', 'description' => 'Restaurar categorías eliminados'])->syncRoles([$rol1, $rol2]);
        //* Roles para Etiquetas
        Permission::create(['name' => 'etiquetas.index', 'description' => 'Ver etiquetas'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'etiquetas.create', 'description' => 'Crear etiquetas'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'etiquetas.edit', 'description' => 'Editar etiquetas'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'etiquetas.destroy', 'description' => 'Eliminar etiquetas'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'etiquetas.eliminar.definitivo', 'description' => 'Eliminar definitivo etiquetas'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'etiquetas.restaurar', 'description' => 'Restaurar etiquetas eliminados'])->syncRoles([$rol1, $rol2]);
        //*Roles para configuraciones de empresa
        Permission::create(['name' => 'configuraciones.index', 'description' => 'Ver configuraciones'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'configuraciones.edit', 'description' => 'Editar configuraciones'])->syncRoles([$rol1, $rol2]);
        //* Roles para Roles
        Permission::create(['name' => 'roles.index', 'description' => 'Ver roles'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles'])->syncRoles([$rol1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$rol1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$rol1]);
        //*Roles para Roles-permisos
        Permission::create(['name' => 'roles.permisos.actualizar', 'description' => 'Actualizar permisos'])->syncRoles([$rol1]);
        Permission::create(['name' => 'roles.permisos.administrar', 'description' => 'Ver permisos'])->syncRoles([$rol1]);
        //* Roles para Políticas
        Permission::create(['name' => 'politicas.index', 'description' => 'Ver políticas'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicas.create', 'description' => 'Crear políticas'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicas.edit', 'description' => 'Editar políticas'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicas.destroy', 'description' => 'Eliminar políticas'])->syncRoles([$rol1, $rol2]);
        //* Roles para Directivos
        Permission::create(['name' => 'directives.index', 'description' => 'Ver directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'directives.create', 'description' => 'Crear directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'directives.edit', 'description' => 'Editar directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'directives.destroy', 'description' => 'Eliminar directivos'])->syncRoles([$rol1, $rol2]);
        //* Roles para tipoLogo
        Permission::create(['name' => 'tipoLogo.index', 'description' => 'Ver tipo de logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tipoLogo.create', 'description' => 'Crear tipo de logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tipoLogo.edit', 'description' => 'Editar tipo de logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tipoLogo.destroy', 'description' => 'Eliminar tipo de logos'])->syncRoles([$rol1, $rol2]);
        //* Roles para Logos
        Permission::create(['name' => 'logos.index', 'description' => 'Ver logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'logos.create', 'description' => 'Crear logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'logos.edit', 'description' => 'Editar logos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'logos.destroy', 'description' => 'Eliminar logos'])->syncRoles([$rol1, $rol2]);

        //* Roles para youth_directive
        Permission::create(['name' => 'politicaJuvenil.index', 'description' => 'Ver Politica Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicaJuvenil.create', 'description' => 'Crear Politica Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicaJuvenil.edit', 'description' => 'Editar Politica Juvenil'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'politicaJuvenil.destroy', 'description' => 'Eliminar Politica Juvenil'])->syncRoles([$rol1, $rol2]);

        //* slide
        Permission::create(['name' => 'slide.index', 'description' => 'Ver Slide'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'slide.create', 'description' => 'Crear Slide'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'slide.edit', 'description' => 'Editar Slide'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'slide.destroy', 'description' => 'Eliminar Slide'])->syncRoles([$rol1, $rol2]);


        //* estrategia metropolitana
        Permission::create(['name' => 'estrategiaMetropolitana.index', 'description' => 'Ver Estrategia Metropolitana'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'estrategiaMetropolitana.create', 'description' => 'Crear Estrategia Metropolitana'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'estrategiaMetropolitana.edit', 'description' => 'Editar Estrategia Metropolitana'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'estrategiaMetropolitana.destroy', 'description' => 'Eliminar Estrategia Metropolitana'])->syncRoles([$rol1, $rol2]);

        //* puestos para los directivos
        Permission::create(['name' => 'posiciones.index', 'description' => 'Ver puesto de directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posiciones.create', 'description' => 'Crear puesto de directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posiciones.edit', 'description' => 'Editar puesto de directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posiciones.destroy', 'description' => 'Eliminar puesto de directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posiciones.eliminar.definitivo', 'description' => 'Eliminar definitivo puesto de directivos'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'posiciones.restaurar', 'description' => 'Restaurar puesto de directivos eliminados'])->syncRoles([$rol1, $rol2]);


         //* tematica
         Permission::create(['name' => 'notasRapidas.index', 'description' => 'Ver tematica'])->syncRoles([$rol1, $rol2]);
         Permission::create(['name' => 'notasRapidas.create', 'description' => 'Crear tematica'])->syncRoles([$rol1, $rol2]);
         Permission::create(['name' => 'notasRapidas.edit', 'description' => 'Editar tematica'])->syncRoles([$rol1, $rol2]);
         Permission::create(['name' => 'notasRapidas.destroy', 'description' => 'Eliminar tematica'])->syncRoles([$rol1, $rol2]);

    }
}
