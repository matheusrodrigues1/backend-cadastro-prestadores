<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    
    protected $table = 'prestadores'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'email', 'telefone', 'foto']; // Campos que podem ser preenchidos

    // Defina o campo 'foto' como binário
    protected $casts = [
        'foto' => 'binary',
    ];
}
