@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Turmas')

@section('conteudo')
<div class="alert alert-danger" role="alert">
   <span>Não há nenhuma Turma cadastrada ao seu usuario no momento, 
      portanto o recurso de agendamento institucional está desativado.</span><br>
   <a  href="{{route('turma.index')}}"  class="alert-link">CADASTRE UMA AQUI</a>
</div>
@endsection