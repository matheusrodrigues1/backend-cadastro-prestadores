<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    
    protected $table = 'prestadores';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'foto',
        'nome_servico',
        'descricao',
        'valor',
    ];

    protected $casts = [
        'foto' => 'binary',
    ];
}
