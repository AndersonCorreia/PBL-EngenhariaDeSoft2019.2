@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciar Visitas Agendadas')

@section('conteudo')
<div class="alert alert-info" role="alert">
   <p>O observatorio não possui nenhum horário com visitas cadastrada para as exposições no periodo atual.
        <br>
        Verifique se o horário dos estagiarios foram confirmados na página de Demanda Web.
      <a  href="{{route('telaGerenciamentoDehorarios.show')}}"  class="alert-link">Verifique aqui.</a>
      
   </p>
</div>

@endsection