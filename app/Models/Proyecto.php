<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['docenteid', 'carreraid', 'nombrepro', 'estado'];

    public function getcarerras(){
        return $this->belongsTo('App\Models\Carreras', 'id');
    }

    public function getdocentes(){
        return $this->belongsTo('App\Models\Docentes', 'id');
    }
}
