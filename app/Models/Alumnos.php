<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = ['claveproyecto', 'programaedu', 'lineainves', 'idcarrera', 'nombredocente', 'colab'];
}
