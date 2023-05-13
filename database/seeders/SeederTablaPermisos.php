<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles para usuarios
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla editar y ver alumnos
            'ver-alumnos',
            'crear-alumnos',
            'editar-alumnos',
            'borrar-alumnos',
        ];
        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
