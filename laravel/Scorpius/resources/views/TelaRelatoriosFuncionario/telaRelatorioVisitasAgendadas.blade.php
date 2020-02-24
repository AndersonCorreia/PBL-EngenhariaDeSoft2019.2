@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Relatório de Visitas Agendadas')

@section('conteudo')


<div class="form-group row col-12">
    <label class="col-sm-12 col-form-label pt-3" nomeEstagiario >Buscar Visita</label>
     <div class="col-9">
        <input id="nomeInst" class="form-control" type="text" name="estagiario" placeholder="Insira o Nome ou Cidade da Instituição" list="instList" required autofocus>
        <datalist id="instList">            
        </datalist>
    </div>     
    <button type="button" class="btn btn-primary float-left" buscar> Buscar </button>
</div>



<form method="get" action="#">
    <div class="instituicoes" >
    <table class="table-borderless">
        
        <thead>
            <tr class="table-secondary">
                <th>Instituição:</th> <td>Colégio Estadual Odorico Tavares</td>
                <th>Cidade:</th> <td>Feira de Santana</td>
            </tr>
        </thead>


        <thead>
            <tr>
                <th>Data da Visita:</th> <td>28/11/2019</td>
                <th>Status:</th> <td>Realizada</td>
            </tr>
        </thead>

            <thead>
                <tr>
                    <th>Total de Alunos:</th> <td>40</td>
                    <th>Titular Responsável:</th> <td>Augusto Vicente</td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Turno:</th> <td>Manhã</td>
                </tr>
            </thead>
   
            <thead>
                <tr>
                    <th>Nome dos Aluno:</th> 
                    <th>Ano Escolar:</th> 
                    <th>Idade:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Henrique Dias Oliveira </td> 
                    <td>2º Semestre</td>
                    <td>14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Marcos Luís Barreto</td> 
                    <td>2º Semestre</td>
                    <td>13 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>João Bento Souza</td> 
                    <td>2º Semestre</td>
                    <td>14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Juceline Arraes Mato</td> 
                    <td>2º Semestre</td>
                    <td>15 anos</td>
                </tr>
            </tbody>

        </table>
</form>

<style>

    .instituicoes{
        width: 900px;
        height: 350px;
        border: solid 5px #ccc;
        padding: 12px;
        margin: 10px;
        display: flex;
        flex-direction:column;
        align-items: center;
        
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


    td:first-child {
        border-left-width: 1px;
    }

</style>
@endsection
