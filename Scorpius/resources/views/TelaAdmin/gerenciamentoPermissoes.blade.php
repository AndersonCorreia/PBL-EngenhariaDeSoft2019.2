@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento De Permissões')

@section('conteudo')
<form  method="POST" action={{route('permissoes.post')}}>
    @csrf
    @include('TelaAdmin._includes.permissoes')
    <div class="col-12 row m-0 px-3 text-right d-block">
        <div class="input-group-append mt-0 form-group col d-block text-right">
            <button id="submit" type="submit" class="btn mr-2 btn-primary">Confirmar alterações</button>
            <a href={{route('permissoes.default')}}>
                <button type="button" class="btn mr-2 text-white btn-warning">Retornar ao Padrão</button>
            </a>
            <a href={{route("dashboard")}}>
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </div>
    </div>
</form>
@endsection