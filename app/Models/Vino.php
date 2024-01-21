<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bodega;
class Vino extends Model
{
    use HasFactory;
    protected $fillable = [
        'bodega_id',
        'nombre',
        'descripcion',
        'año',
        'alcohol',
        'tipo',
    ];
    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }
}
