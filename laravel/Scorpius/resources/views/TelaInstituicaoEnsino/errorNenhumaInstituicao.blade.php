@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')
<div class="alert alert-danger" role="alert">
   <label>{{$erros}}.</label>
   <a  href="{{route('CadastroIntituição.show')}}"  class="alert-link">cadastre uma aqui</a>
</div>
@endsection