<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\CategoriaAluno;

class AlunoController extends Controller
{
    function index(){
        
        $dados = Aluno::all();

        // dd($dados);

        return view('aluno.list', ['dados' => $dados]);
    }
    
    function create(){
        
        $categorias = CategoriaAluno::orderBy('nome')->get();
        
        return view('aluno.form', ['categorias' => $categorias]);
    }

    function validateRequest(Request $request){
        
        $request ->validate([
            'nome' => 'required' ,
             'cpf' => 'required',
             'categoria_id'=>'required',
             'imagem'=> 'image|image|mimes:png,jpg,jpeg',
        ], [
            'nome.required' => "O campo Nome é obrigatório",
            'cpf.required' => "O campo CPF é obrigatório",
            'categoria_id.required' => "O campo Categoria é obrigatório",
            'imagem.image' => "O campo Imagem é obrigatório",
            'imagem.mimes' => "O campo Imagem deve ser do tipo png, jpg, jpeg",
        ]);

    }

    function store( Request $request){
        
        $this ->validateRequest($request);
        $data=$request->all();
        $imagem = $request->file('imagem');

        if($imagem){
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio= "imagem/aluno/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem']= $diretorio.$nome_imagem;
        }

        Aluno::create($data);
        return redirect('aluno');

    }

    function edit($id){
        $dado = Aluno::find($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', ['dado'=> $dado, 'categorias' => $categorias]);
    }

    function update(Request $request, $id){

        $this ->validateRequest($request);

        $data=$request->all();
        $imagem = $request->file('imagem');

        if($imagem){
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio= "imagem/aluno/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem']= $diretorio.$nome_imagem;
        }


        Aluno::find($id)->update($data);

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
