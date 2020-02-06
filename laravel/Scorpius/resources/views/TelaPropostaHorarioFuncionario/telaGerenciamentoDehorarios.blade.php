@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Horários dos estagiários - Funcionário')

@section('conteudo')
<div class="matricula">
    <div class="col-md-5 col-sm-9 m-0 p-0 float-sm-left">
        <h4>NOME DO ESTAGIÁRIO</h4>
        <input id="nomeInst" class="form-control" type="text" name="Instituicao" placeholder="Insira o Nome da instituicão" list="instList" required autofocus>
        <datalist id="instList">
            @if (($estagiarios ?? false))
            @foreach ($estagiarios as $est)
            <option class="opList" value="{{$est['nome']}}">
                @endforeach
                @endif
        </datalist>
    </div>
    <div class="">
        <h4>COMPROVANTE DE MATRÍCULA</h4>
        <button type="button" class="btn btn-outline-secondary" >Download</button>
    </div>

</div>
@endsection

<style>
    .matricula {
        background-color: white;
    }
    .download{
        padding-left:40px ;
    }
    .btn {
    background:url(img/logo-download.png) none;
    text-indent:-9999px;
    width:109px;
    height:41px;
}
</style>