<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**º
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
       $admin = Role::create(['name'=>'admin']);
       $coordinador = Role::create(['name'=>'coordinador']);
       $docente = Role::create(['name'=>'docente']);
       $alumno = Role::create(['name'=>'alumno']);

       //------Permisos-------//

       //Teacher
       Permission::create(['name' => 'teachers.index']);
       Permission::create(['name' => 'teachers.create']);
       Permission::create(['name' => 'teachers.show']);
       Permission::create(['name' => 'teachers.edit']);
       Permission::create(['name' => 'teachers.destroy']);

       //Avisos
       Permission::create(['name' => 'notices.index']);
       Permission::create(['name' => 'notices.create']);
       Permission::create(['name' => 'notices.show']);
       Permission::create(['name' => 'notices.edit']);
       Permission::create(['name' => 'notices.destroy']);

       //ClasRoom
       Permission::create(['name' => 'classroom.index']);
       Permission::create(['name' => 'classroom.create']);
       Permission::create(['name' => 'classroom.show']);
       Permission::create(['name' => 'classroom.edit']);
       Permission::create(['name' => 'classroom.destroy']);

       //Contribuciones
       Permission::create(['name' => 'contribution.index']);
       Permission::create(['name' => 'contribution.create']);
       Permission::create(['name' => 'contribution.show']);
       Permission::create(['name' => 'contribution.edit']);
       Permission::create(['name' => 'contribution.destroy']);

       //grupos
       Permission::create(['name' => 'groups.index']);
       Permission::create(['name' => 'groups.create']);
       Permission::create(['name' => 'groups.show']);
       Permission::create(['name' => 'groups.edit']);
       Permission::create(['name' => 'groups.destroy']);

       //subjects
       Permission::create(['name' => 'subjects.index']);
       Permission::create(['name' => 'subjects.create']);
       Permission::create(['name' => 'subjects.show']);
       Permission::create(['name' => 'subjects.edit']);
       Permission::create(['name' => 'subjects.destroy']);

       //SchoolCycles
       Permission::create(['name' => 'schoolCycles.index']);
       Permission::create(['name' => 'schoolCycles.create']);
       Permission::create(['name' => 'schoolCycles.show']);
       Permission::create(['name' => 'schoolCycles.edit']);
       Permission::create(['name' => 'schoolCycles.destroy']);

       //students
       Permission::create(['name' => 'students.index']);
       Permission::create(['name' => 'students.create']);
       Permission::create(['name' => 'students.show']);
       Permission::create(['name' => 'students.edit']);
       Permission::create(['name' => 'students.destroy']);

       //Tutor
       Permission::create(['name' => 'tutor.index']);
       Permission::create(['name' => 'tutor.create']);
       Permission::create(['name' => 'tutor.show']);
       Permission::create(['name' => 'tutor.edit']);
       Permission::create(['name' => 'tutor.destroy']);

       //documentos
       Permission::create(['name' => 'document.index']);
       Permission::create(['name' => 'document.create']);
       Permission::create(['name' => 'document.show']);
       Permission::create(['name' => 'document.edit']);
       Permission::create(['name' => 'document.destroy']);

       //address
       Permission::create(['name' => 'address.index']);
       Permission::create(['name' => 'address.create']);
       Permission::create(['name' => 'address.show']);
       Permission::create(['name' => 'address.edit']);
       Permission::create(['name' => 'address.destroy']);

       //calificaciones
       Permission::create(['name' => 'qualification.index']);
       Permission::create(['name' => 'qualification.create']);
       Permission::create(['name' => 'qualification.show']);
       Permission::create(['name' => 'qualification.edit']);
       Permission::create(['name' => 'qualification.destroy']);

       //clase
       Permission::create(['name' => 'class.index']);
       Permission::create(['name' => 'class.create']);
       Permission::create(['name' => 'class.show']);
       Permission::create(['name' => 'class.edit']);
       Permission::create(['name' => 'class.destroy']);

       //cronograma
       Permission::create(['name' => 'schedule.index']);
       Permission::create(['name' => 'schedule.create']);
       Permission::create(['name' => 'schedule.show']);
       Permission::create(['name' => 'schedule.edit']);
       Permission::create(['name' => 'schedule.destroy']);

    }
}