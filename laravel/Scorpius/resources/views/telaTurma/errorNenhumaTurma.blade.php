@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Turmas')

@section('conteudo')
<div class="alert alert-danger" role="alert">
   <label>Não há nenhuma Turma cadastrada ao seu usuario no momento, 
      portanto o recurso de agendamento está desativados.</label><br>
   <a  href="{{route('telaTurmas')}}"  class="alert-link">CADASTRE UMA AQUI</a>
</div>
@endsection