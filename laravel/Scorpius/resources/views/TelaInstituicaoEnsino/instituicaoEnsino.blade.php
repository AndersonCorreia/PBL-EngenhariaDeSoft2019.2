@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Instituições')

@section('conteudo')

<h1>Instituições de ensino</h1> 
<form method="get" action="#">
    {{csrf_field()}}
    <div class="instituicoes">
        <h2>Colegio x</h2> 
        <div class="box-actions">
			<button type="submit" class="btn-a">Atualizar dados</button>
            <button type="submit" class="btn-d">Deletar</button>
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
        border: solid 3px black;
        padding: 20px;
        margin: 10px;
        display: flex;
        flex-direction: row;
    }
   

</style>
@endsection
