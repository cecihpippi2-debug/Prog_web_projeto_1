@extends('main')
@section ('titulo', "Cadastro de aluno")
@section('conteudo')

<h4>
    Cadastro de Aluno
</h4>
@php
    if(!empty($dado->id)){
        $action = route("aluno.update", $dado->id);
    } else {
        $action = route('aluno.store');
    }
@endphp

<!--Formulário de cadastro dos alunos, tirados do site Bootsrap-->
<form action="{{ $action }}" method="POST">
    @csrf
    @if(!empty($dado->id))
        @method('PUT')
    @endif
    <div class="row">
        <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">
        <div class="col">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome"
            value="{{ old('nome', $dado->nome ?? '')}}">
        </div>
        <div class="col">
            <label class="form-label" for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf"
            value="{{ old('cpf', $dado->cpf ?? '')}}">
        </div>
        <div class="col">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone"
            value="{{ old('telefone', $dado->telefone ?? '')}}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{url('aluno')}}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</form>