@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')
<div class="alert alert-danger" role="alert">
   <span>Não há nenhuma instituição cadastrada ao seu usuario no momento, 
      portanto parte dos recursos do sistema está desativado.</span><br>
   <a  href="{{route('CadastroIntituição.show')}}"  class="alert-link">CADASTRE UMA AQUI</a>
</div>
@endsection