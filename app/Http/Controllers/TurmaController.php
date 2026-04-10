<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\Curso;


class TurmaController extends Controller
{
    function index(Curso $curso){
        
        $dados = $curso->turmas;

        return view('turma.list_turma', ['dados' => $dados, 'curso' => $curso]);
    }
    
    function create(Curso $curso){
                
        return view('turma.form_turma', ['curso' => $curso]);
    }

    function validateRequest(Request $request){
        
        $request ->validate([
            'nome' => 'required'
    
            ], [
            'nome.required' => "O campo Nome é obrigatório"
            
        ]);

    }

    function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        $turma = Turma::create($data);

        return redirect()->route('curso.turmas', $turma->curso_id)->with('success', 'Registro inserido com sucesso');
    }

    function edit($id){
        $dado = Turma::find($id);
        $curso = Curso::orderBy('nome')->get();

        return view('turma.form_turma', ['dado'=> $dado, 'curso' => $curso]);
    }

    function update(Request $request, $id){

        $this ->validateRequest($request);

        $data=$request->all();


        Turma::find($id)->update($data);

        $turma = Turma::find($id);
        return redirect()->route('curso.turmas', $turma->curso_id)->with('success', 'Registro atualizado com sucesso');

    }

    function destroy($id)
        {
            $dado = Turma::findOrfail($id);

            $dado->delete();

            return redirect()->route('curso.turmas', $dado->curso_id);
        }


    
    
    
        
    function search(Request $request){
        $curso = Curso::findOrFail($request->curso_id);

        if(!empty($request->valor)){
            $dados = Turma::where('curso_id', $curso->id)->
            where($request->tipo, 'like', '%' . $request->valor . '%') ->get();
        } else{
            $dados=Turma::where('curso_id', $curso->id)->orderBy('nome')->get();
        }

        return view('turma.list_turma', ['dados'=>$dados, 'curso'=>$curso]);
    }
}
