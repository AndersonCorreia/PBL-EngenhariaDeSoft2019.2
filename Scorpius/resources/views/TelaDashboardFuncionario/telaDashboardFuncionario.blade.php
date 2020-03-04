@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Painel de Controle do Funcionário')

@section('conteudo')



<form method="get" action="#"> <!--bloco começa aqui -->

<div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>
    <table class="table-borderless col-12">
        <thead>
        <!-- Somente exemplificando a estrutura -->
            <tr class="table-secondary">
                <th>Nome da Instituição:</th> <td>Colégio Estadual Odorico Tavares</td>
                <th>Cidade:</th> <td>Feira de Santana</td>
            </tr>
        </thead>

        <thead>
            <tr>
                <th>Data da Visita:</th> <td>28/11/2019</td> <!-- Exemplo da estrutura -->
                <th>Turno da Visita:</th> <td>Manhã</td>
            </tr>
        </thead>

        <thead>
            <tr>
                <th>Status da Visita:</th> <td>Realizada</td>
                <th>Telefone da Instituição:</th> <td>7531618000</td>
            </tr>
        </thead>

            <thead>
                <tr>
                    <th>Total de Alunos da Turma:</th> <td>5</td>
                    <th>Responsável pela Turma:</th> <td>Augusto Vicente</td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Nível de Ensino da Turma:</th> <td> Ensino Médio</td>
                    <th>Ano Escolar da Turma:</th> <td>1º Ano</td> 
                </tr>
            </thead>
        </table>
    </form>
</div>

</div>


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
        width: 1050px;
        height: 250px;
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
