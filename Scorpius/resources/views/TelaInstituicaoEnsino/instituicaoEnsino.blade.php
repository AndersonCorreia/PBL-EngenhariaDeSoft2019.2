@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Minhas Instituições de Ensino')

@section('conteudo')

<div class="m-1 p-3">

    <div class="form-group col-12 m-0 p-0">
        <h5>Instituições de Ensino Vínculadas</h5>
    </div>
    @foreach($registros as $registro)
    <div class= "row p-1 mt-3 mx-0 scorpius-border-shadow border-top border-shadow">
        <div class="row col-10 col-md-11 my-1" >
            <div class="row col-12 font-weight-bold">
                <div class= "col-7 col-5 col-md-3">Nome</div>
                <div class= "col-5 col-md-3">Responsável</div>
                <div class= "col-8 col-md-4">Endereço</div>
                <div class= "col-4 col-md-2 m-0">Telefone</div>
            </div>
            <div class="row col-12">
                <div class="col-7 col-md-3">{{$registro['nome']}}</div>
                <div class="col-5 col-md-3">{{$registro['responsavel']}}</div>
                <div class="col-8 col-md-4">{{$registro['endereco']}}</div>
                <div class="col-4 col-md-2 m-0">{{$registro['telefone']}}</div>
            </div>
        </div>
        <div class="col-2 col-md-1 mx-0 my-1 p-0 float-left">
            <a class="btn col btn-primary btn-sm p-1" href="{{route('user.instituicoes.editar', $registro['instituicao_ID'])}}">Atualizar</a>
            <a class="btn col btn-danger btn-sm p-1" href="{{route('user.instituicoes.deletar', $registro['instituicao_ID'])}}">Deletar</a>
        </div>
    </div>
    @endforeach
</div>

<style>

    .box-actions{
        margin:0px 0px 0px 400px;
    }
    .btn-a{
        font-weight: bold;
	    padding: 10px;
	    float: left;
	    border: 1px;
	    border-color: black;
	    color: black;
        background-color: #1B5E20;
	    margin-left: 20px;
    }
    .btn-d{
        font-weight: bold;
	    padding: 10px;
	    float: left;
	    border: 1px;
	    border-color: black;
	    color: black;
        background-color: #FF9800;
	    margin-left: 20px;
    }

    .instituicoes{
        widdiv class= "col": 920px;
        height: 100px;
        border: solid 5px black;
        padding: 12px;
        margin: 10px;
        display: flex;
        flex-direction:column;
        align-items: center;
        
    }

    .instBotoes{
        align-items: center;
        display: flex;
        flex-direction: row;
    }
    
    .botoes{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .btn{
        padding: 10px; 
        margin: 5px;
    }

    h2{
        align-items: center;
    }

    div, div class= "col"{
        padding: 0px 50px 0px 20px;
    }
   

</style>
@endsection
