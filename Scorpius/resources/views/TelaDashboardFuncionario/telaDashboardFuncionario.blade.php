@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Painel de Controle do Funcionário')

@section('conteudo')


<form method="get" action="#"> <!--bloco começa aqui -->

    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>

    </div>

    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>

    </div>

    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>

    </div>

</form>

<style>
    .instituicoes{
        width: 850px;
        height: 330px;
        border: solid 5px #ccc;
        padding: 12px;
        margin: 10px;
        display: flex;
        flex-direction:column;
        align-items: center;  
    }

    [borda]{
        width: 300px;
        height: 400px;
    }

    [bordaModal]{
        width: 750px;
        height: 620px;
    }

    [expand]{
        margin-top: 5px;
        margin-left: 20px; 
        margin-right: 15px;
        width: 155px;
        height: 40px;
    }

    h2{
        align-items: center;
    }

    td, th{
        padding: 0px 40px 0px 5px;
    }
   
    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -8px;
    }

    /*Organização das linhas da tabela*/
    .table-secondary {
        border-left-width: 0;
        min-width: 50px;
        height: 50px;
    }
    .table-warning {
        border-left-width: 0;
        min-width: 50px;
        height: 50px;
    }


    td:first-child {
        border-left-width: 1px;
    }

</style>
@endsection
