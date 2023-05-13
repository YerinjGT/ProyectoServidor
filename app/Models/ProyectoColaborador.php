<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoColaborador extends Model
{
    use HasFactory;
    protected $fillable = ['idProyecto', 'idColaborador'];

    public function getProyecto(){
        return $this->belongsTo('App\Models\Proyectos', 'idProyecto','id');
    }

    public function getColaborador(){
        return $this->belongsTo('App\Models\Colaboradores', 'idColaborador','id');
    }
}
