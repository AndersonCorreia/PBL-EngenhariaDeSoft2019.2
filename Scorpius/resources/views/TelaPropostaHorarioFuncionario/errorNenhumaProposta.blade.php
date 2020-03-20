@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')
{{dd($observacoes)}}
<div class="alert alert-danger" role="alert"> <!-- Tela de erros -->
   <label>Não há nenhum Estagiário cadastrado no momento, 
      portanto parte dos recursos do sistema estão desativados.</label><br>
   <a  href="{{route('CadastroIntituição.show')}}"  class="alert-link">VOLTAR AO INICIO</a>
</div>
@endsection