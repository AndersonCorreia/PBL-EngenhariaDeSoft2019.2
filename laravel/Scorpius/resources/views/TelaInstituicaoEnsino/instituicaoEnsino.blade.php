@extends('layout.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')

<h1>Instituições de ensino</h1> 
<form method="GET" action="/usuario/instituicaoEnsino">
    {{csrf_field()}}
    <div class="instituicoes">
       
    </div>
</form>
@endsection