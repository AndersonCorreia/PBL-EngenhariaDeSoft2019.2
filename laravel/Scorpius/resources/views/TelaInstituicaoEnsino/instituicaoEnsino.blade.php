@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')
<h1>Instituições de Ensino</h1> 
<form method="get" action="#">
    {{csrf_field()}}

    <div class= "instBotoes">
        <div class="instituicoes">
            <h2>Colegio X</h2> 
            
        </div>

        <div class="botoes">
                <button type="submit" class="btn col btn-primary">Atualizar dados</button>
                <button type="submit" class="btn col btn-danger">Deletar</button>
        </div>
    </div>
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
        width: 400px;
        height: 100px;
        border: solid 2px black;
        padding: 20px;
        margin: 10px;
        display: flex;
        flex-direction: row;
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
   

</style>
@endsection
