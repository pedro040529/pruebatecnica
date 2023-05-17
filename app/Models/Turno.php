<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $table = 'turno';

    protected $fillable = [
        'turno', 
        'estado'
    ];

    public function estadosT(){
        return $this->estado == 1 ? 'activo' : 'inactivo';
    }

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class);
    }
}
