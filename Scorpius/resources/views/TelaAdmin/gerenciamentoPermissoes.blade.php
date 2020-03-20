@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento De Permissões')

@section('conteudo')
<form  method="POST" action="#">
    @include('TelaAdmin._includes.permissoes')
        
    <div class="col-12 m-0 px-3">
    </div>
</form>
@endsection