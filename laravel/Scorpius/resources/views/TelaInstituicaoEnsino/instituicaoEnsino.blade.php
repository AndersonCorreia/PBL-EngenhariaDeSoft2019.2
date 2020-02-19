@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Minhas Instituições de Ensino')

@section('conteudo')

<div class="form-group col-12 pt-3">
<h5>Instituições de Ensino Cadastradas</h5>
</div>


<form method="get" action="#">
    {{csrf_field()}}
    
    
    @foreach($registros as $registro)
    <div class= "instBotoes">
        <div class="instituicoes" >
        <table class="table-borderless">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$registro['nome']}}</td>
                    <td>{{$registro['responsavel']}}</td>
                    <td>{{$registro['endereco']}}</td>
                    <td>{{$registro['telefone']}}</td>
                </tr>
            </tbody>
        </table>
        </div>

        <div class="botoes">
                <a class="btn col btn-primary" href="{{route('user.instituicoes.editar', $registro['instituicao_ID'])}}">Atualizar</a>
                <a  href="{{route('user.instituicoes.deletar', $registro['instituicao_ID'])}}" class="btn col btn-danger">Deletar</a>
        </div>
        </div>
        @endforeach
    
</form>

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
        width: 920px;
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

    td, th{
        padding: 0px 50px 0px 20px;
    }
   

</style>
@endsection
