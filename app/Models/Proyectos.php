<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'objetivos', 'clave', 'programa', 'linea','fechaInicio','fechaFin','estado','responsable','carreraid'];

    public function getCarerras(){
        return $this->belongsTo('App\Models\Carreras', 'carreraid','id');
    }

    public function getResponsable(){
        return $this->belongsTo('App\Models\Colaboradores', 'responsable','id');
    }
}
