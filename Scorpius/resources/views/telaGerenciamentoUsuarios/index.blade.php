@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerenciamento de Usuários')

@section('conteudo')

<div class="scorpius-border pl-5 pr-5 pb-5 pt-3">
  <p class="h2">Usuários: </p>
  @if (empty($usuarios))
  <div class="alert alert-secondary" role="alert">Não há usuários administrativos.</div>
  @else
  @if(session('success'))
  <div class="alert alert-success mt-3" role="alert">{{session('success')}}</div>
  @endif
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
  <div class="row scorpius-border-shadow-sm mt-2 p-3">
    <div class="col-md-5">
      <p class="h4">{{$usuario['nome']}}</p>
    </div>
    <div class="col-md-2">
      <p class="h4">{{$usuario['telefone']}}</p>
    </div>

    <div class="col-md-4 form-group">
      <form action="{{ route('gerenciarUsuarios.mudarUsuario') }}" method="post">
        <input name="usuario" type="hidden" value="{{$usuario['ID']}}">
        @csrf
        <div class="row">
          <div class="col-sm-8">
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
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Alterar</button>
          </div>
      </form>
      
    </div>
    
  </div>
  <div class="col-md-1">
    <form action="{{ route('gerenciarUsuarios.excluirUsuario') }}" method="post">
      @csrf
      <input name="usuario" type="hidden" value="{{$usuario['ID']}}">
      <button type="submit" class="btn btn-danger">Excluir</button>
    </form> 
  </div>
    
</div>
@endforeach
@endif
</div>

@endsection
@section('js')

@endsection