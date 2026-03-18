<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table ="alunos";

    protected $fillable = [ //Campos que vão ser salvos no banco
        'nome',
        'cpf',
        'telefone',
        'imagem',
        'categoria_id',
    ];

    //Chave estrangeira para categoria
    public function categoria(){
        return $this->belongsTo(CategoriaAluno::class, 'categoria_id');
    }
}
