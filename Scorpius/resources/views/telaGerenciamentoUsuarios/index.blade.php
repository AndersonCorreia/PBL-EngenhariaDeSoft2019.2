@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento de Usuários')

@section('conteudo')

<div class="scorpius-border pl-5 pr-5 pb-5 pt-3">
  @if (empty($usuarios))
  <div class="alert alert-secondary" role="alert">Não há usuários administrativos.</div>
  @else
  <div class="row text-center">
    <div class="col-md-7">
      <h3>Nome</h3>
    </div>
    <div class="col-md-2">
      <h3>Telefone</h3>
    </div>
    <div class="col-md-3">
      <h3>Tipo Usuário</h3>
    </div>
  </div>
  @foreach ($usuarios as $usuario)
  <form action="{{ route('gerenciarUsuarios.mudarUsuario') }}" method="post">
    @csrf
    <input name="usuario" type="hidden" value="{{$usuario['ID']}}">
    <div class="row scorpius-border-shadow-sm mt-2 p-3">
      <div class="col-md-7">
        <p class="h4">{{$usuario['nome']}}</p>
      </div>
      <div class="col-md-2">
        <p class="h4">{{$usuario['telefone']}}</p>
      </div>
      <div class="col-md-2 form-group">
        <select name="tipo" id="" class="form-control">
          @foreach ($tipos as $tipo)
          @if ($usuario['tipo_usuario_ID'] == $tipo['ID'])
          <option selected value="{{$tipo['ID']}}">{{$tipo['tipo']}}</option>
          @elseif($tipo['tipo'] != 'scorpius')
          <option value="{{$tipo['ID']}}">{{$tipo['tipo']}}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Alterar</button>
      </div>
    </div>
  </form>
  @endforeach
  @endif
</div>

@endsection
@section('js')

@endsection