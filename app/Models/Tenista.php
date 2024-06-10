<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenista extends Model
{
    use HasFactory;
    protected $table = 'tenistas';
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';

    protected $fillable = [
        'ranking',
        'bestRanking',
        'nombre_completo',
        'pais',
        'fecha_nacimiento',
        'edad',
        'altura',
        'peso',
        'profesional_desde',
        'mano_pref',
        'reves',
        'entrenador',
        'price_money',
        'win',
        'lost',
        'win_rate',
        'puntos',
        'imagen',
        'isDeleted'
    ];

    protected $hidden = [
      'isDeleted'
    ];

    protected $casts = [
      'isDeleted' => 'boolean'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(nombre_completo) LIKE ?', ["%" . strtolower($search) . "%"]);
    }

    public function torneos()
    {
        return $this->belongsToMany(Torneo::class, 'inscripciones');
    }

}
