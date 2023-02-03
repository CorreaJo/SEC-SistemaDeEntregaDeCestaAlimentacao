<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'unidade',
        'endereco',
        'quantMembros',
        'observacao'
    ];
}
