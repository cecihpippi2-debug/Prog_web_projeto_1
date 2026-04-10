<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    function index(){
        
        $dados = Curso::all();

        // dd($dados);

        return view('curso.list_curso', ['dados' => $dados]);
    }
    
    function create(){
                
        return view('curso.form_curso');
    }

    function validateRequest(Request $request){
        
        $request ->validate([
            'nome' => 'required' ,
             'requisito' => 'nullable|string',
             'carga_horaria' => 'nullable|numeric',
            'valor' => 'nullable|numeric',        
            ], [
            'nome.required' => "O campo Nome é obrigatório",
            'requisito.string' => "O campo deve ser caractere",
            'carga_horaria.numeric' => "O campo deve ser numérico",
        ]);

    }

    function store( Request $request){
        
        $this ->validateRequest($request);
        $data=$request->all();


        Curso::create($data);
        return redirect('curso')->with('success', 'Registro inserido com sucesso');

    }

    function edit($id){
        $dado = Curso::find($id);

        return view('curso.form_curso', ['dado'=> $dado]);
    }

    function update(Request $request, $id){

        $this ->validateRequest($request);
        $data=$request->all();

        Curso::find($id)->update($data);
        return redirect('curso')->with('success', 'Registro atualizado com sucesso');
    }

    function destroy($id){

        $dado=Curso::find($id);
        if($dado->turmas->count() > 0){
            return redirect('curso')->with('error', 'Não é possível excluir o curso pois há turmas vinculadas a ela.');
        }

        $dado->delete();
        return redirect('curso');
    }

    function search(Request $request){
        if(!empty($request->valor)){
            $dados = Curso::where($request->tipo, 'like', '%' . $request->valor . '%') ->get();
        } else{
            $dados=Curso::all();
        }

        return view('curso.list_curso', ['dados'=>$dados]);
    }
}
