@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Agendamento')

@section('conteudo')
<div class="alert alert-info" role="alert">
    <p>Não há nenhuma atividade sendo realizada nesta modalidade no periodo Atual.
       <br>
       Pode haver atividades em outras modalidades de agendamento, entre em contato com o observatorio para ser 
       informado qual o proximo periodo aberto a visitas.</p>
    <br>
    <span class="font-weight-bold">
    <div class="col-md-4">
       <a href="tel:+7536241921">
           <i class='fas fa-phone' style='font-size:30px'></i>
           TELEFONES:
       </a>
       <a href="tel:+7536241921">
           <p>(+55) 75 3624 1921</p>
       </a>
       <a href="tel:+55754000">
           <p>4000 (UEFS)</p>
       </a>
    </div>
    <div class="col-md-4">
       <a href="mailto:">
           <i class="fa fa-envelope" aria-hidden="true" style="font-size: 30px;"></i>
           EMAILS:
       </a>
       <a href="mailto:observatoriouefs@gmail.com">
           <p>observatoriouefs@gmail.com</p>
       </a>
       <a href="mailto:museuantares@gmail.com">
           <p>museuantares@gmail.com</p>
       </a>
    </div>
    </span>
</div>
@endsection