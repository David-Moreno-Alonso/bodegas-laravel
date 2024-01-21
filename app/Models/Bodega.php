<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vino;

class Bodega extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'localizacion',
        'telefono',
        'email',
        'contacto',
        'fundacion',
        'restaurante',
        'hotel',
    ];
    public function vinos()
    {
        return $this->hasMany(Vino::class);
    }
}
