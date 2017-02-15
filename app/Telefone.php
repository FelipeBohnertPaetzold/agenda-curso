<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'id',
        'ddd',
        'fone',
        'pessoa_id'
    ];

    protected $table = 'telefone';
}
