<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    
    use HasFactory;

    protected $table = 'pelicula';

    protected $fillable = [
        'nombre',
        'fecha_publicacion',
        'imagen',
        'estado'
    ];

    public function estados(){
        return $this->estado == 1 ? 'activo' : 'inactivo';
    }

    public function turnos()
{
    return $this->belongsToMany(Turno::class);
}

}
