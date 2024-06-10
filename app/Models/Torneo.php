<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $table = 'torneos';
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'tipo_torneo',
        'categoria',
        'superficie',
        'entradas',
        'fecha_ini',
        'fecha_fin',
        'premio',
        'imagen',
        'isDeleted',
    ];

    protected $hidden = [
      'isDeleted'
    ];

    protected $casts = [
        'isDeleted' => 'boolean'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($search) . "%"])
            ->orWhereRaw('LOWER(ubicacion) LIKE ?', ["%" . strtolower($search) . "%"]);
    }

    public function tenistas()
    {
        return $this->belongsToMany(Tenista::class, 'inscripciones');
    }

}
