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
       $docente = Role::create(['name'=>'docente']);
       $alumno = Role::create(['name'=>'alumno']);

       //------Permisos-------//

       //Teacher
       Permission::create(['name' => 'teachers.index'])->assignRole($admin);
       Permission::create(['name' => 'teachers.create'])->assignRole($admin);
       Permission::create(['name' => 'teachers.show'])->assignRole($admin);
       Permission::create(['name' => 'teachers.edit'])->assignRole($admin);
       Permission::create(['name' => 'teachers.destroy'])->assignRole($admin);

       //Avisos
       Permission::create(['name' => 'notices.index']);
       Permission::create(['name' => 'notices.create'])->assignRole($admin);
       Permission::create(['name' => 'notices.show']);
       Permission::create(['name' => 'notices.edit'])->assignRole($admin);
       Permission::create(['name' => 'notices.destroy'])->assignRole($admin);

       //Aulas
       Permission::create(['name' => 'classroom.index'])->assignRole($admin);
       Permission::create(['name' => 'classroom.create'])->assignRole($admin);
       Permission::create(['name' => 'classroom.show'])->assignRole($admin);
       Permission::create(['name' => 'classroom.edit'])->assignRole($admin);
       Permission::create(['name' => 'classroom.destroy'])->assignRole($admin);

       //Aportaciones
       Permission::create(['name' => 'contribution.index'])->assignRole($admin);
       Permission::create(['name' => 'contribution.create'])->assignRole($admin);
       Permission::create(['name' => 'contribution.show'])->assignRole($admin);
       Permission::create(['name' => 'contribution.edit'])->assignRole($admin);
       Permission::create(['name' => 'contribution.destroy'])->assignRole($admin);

       //grupos
       Permission::create(['name' => 'groups.index'])->assignRole($admin);
       Permission::create(['name' => 'groups.create'])->assignRole($admin);
       Permission::create(['name' => 'groups.show'])->assignRole($admin);
       Permission::create(['name' => 'groups.edit'])->assignRole($admin);
       Permission::create(['name' => 'groups.destroy'])->assignRole($admin);

       //materias
       Permission::create(['name' => 'subjects.index'])->assignRole($admin);
       Permission::create(['name' => 'subjects.create'])->assignRole($admin);
       Permission::create(['name' => 'subjects.show'])->assignRole($admin);
       Permission::create(['name' => 'subjects.edit'])->assignRole($admin);
       Permission::create(['name' => 'subjects.destroy'])->assignRole($admin);
       Permission::create(['name' => 'subjects.assign-teacher'])->assignRole($admin);

       //Ciclo Escolar
       Permission::create(['name' => 'schoolCycles.index'])->assignRole($admin);
       Permission::create(['name' => 'schoolCycles.create'])->assignRole($admin);
       Permission::create(['name' => 'schoolCycles.show'])->assignRole($admin);
       Permission::create(['name' => 'schoolCycles.edit'])->assignRole($admin);
       Permission::create(['name' => 'schoolCycles.destroy'])->assignRole($admin);

       //students
       Permission::create(['name' => 'students.index'])->assignRole($admin);
       Permission::create(['name' => 'students.create'])->assignRole($admin);
       Permission::create(['name' => 'students.show'])->assignRole($admin);
       Permission::create(['name' => 'students.edit'])->assignRole($admin);
       Permission::create(['name' => 'students.destroy'])->assignRole($admin);

       //Tutor
       Permission::create(['name' => 'tutor.index'])->assignRole($admin);
       Permission::create(['name' => 'tutor.create'])->assignRole($admin);
       Permission::create(['name' => 'tutor.show'])->assignRole($admin);
       Permission::create(['name' => 'tutor.edit'])->assignRole($admin);
       Permission::create(['name' => 'tutor.destroy'])->assignRole($admin);

       //documentos
       Permission::create(['name' => 'document.index'])->assignRole($admin);
       Permission::create(['name' => 'document.create'])->assignRole($admin);
       Permission::create(['name' => 'document.show'])->assignRole($admin);
       Permission::create(['name' => 'document.edit'])->assignRole($admin);
       Permission::create(['name' => 'document.destroy'])->assignRole($admin);

       //address
       Permission::create(['name' => 'address.index'])->assignRole($admin);
       Permission::create(['name' => 'address.create'])->assignRole($admin);
       Permission::create(['name' => 'address.show'])->assignRole($admin);
       Permission::create(['name' => 'address.edit'])->assignRole($admin);
       Permission::create(['name' => 'address.destroy'])->assignRole($admin);

       //calificaciones
       Permission::create(['name' => 'qualification.index']);
       Permission::create(['name' => 'qualification.create']);
       Permission::create(['name' => 'qualification.show']);
       Permission::create(['name' => 'qualification.edit']);
       Permission::create(['name' => 'qualification.destroy']);

       //clase
       Permission::create(['name' => 'courses.index'])->assignRole($admin);
       Permission::create(['name' => 'courses.create'])->assignRole($admin);
       Permission::create(['name' => 'courses.show'])->assignRole($admin);
       Permission::create(['name' => 'courses.edit'])->assignRole($admin);
       Permission::create(['name' => 'courses.destroy'])->assignRole($admin);

       //cronograma
       Permission::create(['name' => 'schedule.index'])->assignRole($admin);
       Permission::create(['name' => 'schedule.create'])->assignRole($admin);
       Permission::create(['name' => 'schedule.show'])->assignRole($admin);
       Permission::create(['name' => 'schedule.edit'])->assignRole($admin);
       Permission::create(['name' => 'schedule.destroy'])->assignRole($admin);

       //Usuario
       Permission::create(['name' => 'user.index']);
       Permission::create(['name' => 'user.create']);
       Permission::create(['name' => 'user.show']);
       Permission::create(['name' => 'user.edit']);
       Permission::create(['name' => 'user.destroy']);
    }
}