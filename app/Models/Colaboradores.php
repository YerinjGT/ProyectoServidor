<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model
{

    use HasFactory;
    protected $fillable = ['nombre', 'apellidoP', 'apellidoM', 'email', 'telefono', 'colab_type','nControl','idCarrera','department'];

    public function getCarerras(){
        return $this->belongsTo('App\Models\Carreras', 'idCarrera','id');
    }
}
