@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')
<div class="alert alert-danger" role="alert">
   <label>Não há nenhuma instituição cadastrada ao seu usuário no momento, 
      portanto parte dos recursos do sistema estão desativados.</label><br>
   <a  href="{{route('CadastroIntituição.show')}}"  class="alert-link">CADASTRE UMA INSTITUIÇÃO AQUI</a>
</div>
@endsection