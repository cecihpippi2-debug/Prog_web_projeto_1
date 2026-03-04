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
        return redirect('aluno');

    }

    function edit($id){
        $dado = Aluno::find($id);
        return view('aluno.form', ['dado'=> $dado]);
    }

    function update(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ], [
            'nome' => "O :attribute é obrigatório",
            'cpf' => "O :attribute é obrigatório",

        ]);

        Aluno::find($id)->update($request->all());

        return redirect('aluno');
    }

    function destroy($id){
        Aluno::destroy($id);
        return redirect('aluno');
    }

    function search(Request $request){
        if(!empty($request->valor)){
            $dados = Aluno::where($request->tipo, 'like', '%' . $request->valor . '%') ->get();
        } else{
            $dados=Aluno::all();
        }

        return view('aluno.list', ['dados'=>$dados]);
    }
    
}
