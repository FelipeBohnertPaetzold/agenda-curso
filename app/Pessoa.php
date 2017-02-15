<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'id',
        'nome'
    ];

    protected $table = 'pessoa';

    public function filtroLetra($letra)
    {
        return $this->where('nome', 'LIKE', $letra . '%')->get();
    }

    public function buscar($criterio)
    {
        return $this->where('nome', 'LIKE', '%' . $criterio . '%')->get();
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }
}
