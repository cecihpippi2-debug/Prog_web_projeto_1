<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    function index(){
        
        $dados = Aluno::all();

        // dd($dados);

        return view('aluno.list', ['dados' => $dados]);
    }
    
    function create(){
        
        return view('aluno.form');
    }

    function store( Request $request){
        $request ->validate([
            'nome' => 'required' ,
             'cpf' => 'required', 
        ], [
            'nome' => "O campo Nome é obrigatório",
            'cpf' => "O campo CPF é obrigatório"
        ]);

        Aluno::create([
            'nome' => $request ->nome,
            'cpf' => $request ->cpf,
            'telefone' => $request ->telefone
        ]);

        //Aluno::create($request ->());

        return redirect('aluno');

    }
    
}
