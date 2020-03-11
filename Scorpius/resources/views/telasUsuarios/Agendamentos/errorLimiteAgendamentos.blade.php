@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
<div class="alert mx-4 mt-2 p-2 alert-danger" role="alert">
    <p>Limite de agendamentos ativos ao mesmo tempo desta categoria ultrapassado.<br>
        É considerado agendamento ativo, agendamentos para datas futuras com o status
        de confirmado, pendente ou lista de espera. <br>
        Tente realizar um novo agendamento após uma visita, ou cancele algum agendamento futuro desta categoria.
        <br>Para cancelar um agendamento veja a area de agendamentos na 
        <a  href="{{route('dashboard')}}"  class="alert-link">pagina inicial.</a>
    </p>
</div>
<div class="alert alert-info mx-4 mb-2 m-0 p-2" role="alert">
    <span>
        Ainda é possivel realizar agendamentos em outra categoria, caso o limite desta não tenha sido ultrapassado.
    </span>
</div>

@endsection