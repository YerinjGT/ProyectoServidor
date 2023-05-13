<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;
    protected $fillable = ['claveproyecto', 'programaedu', 'lineainves', 'idcarrera', 'nombredocente', 'colab'];

    public function getCarerras(){
        return $this->belongsTo('App\Models\Carreras', 'id');
    }
}
