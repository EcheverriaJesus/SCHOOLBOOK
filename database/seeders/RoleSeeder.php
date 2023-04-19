<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles

       $admin = Role::create(['name'=>'admin']);
       $coordinador = Role::create(['name'=>'coordinador']);
       $docente = Role::create(['name'=>'docente']);
       $alumno = Role::create(['name'=>'alumno']);

       //Permisos

    }
}
