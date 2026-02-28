@extends('main')
@section ('titulo', "Cadastro de aluno")
@section('conteudo')

<h4>
    Cadastro de Aluno
</h4>
<!--Formulário de cadastro dos alunos, tirados do site Bootsrap-->
<form action="{{route('aluno.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="col">
            <label class="form-label" for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf">
        </div>
        <div class="col">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{url('aluno')}}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</form>