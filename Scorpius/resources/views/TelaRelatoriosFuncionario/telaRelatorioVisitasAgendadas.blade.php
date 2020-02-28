@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Relatórios de Visitas Agendadas')

@section('conteudo')


<div class="form-group row col-12">
    <label class="col-sm-12 col-form-label pt-3" nomeInstituicao >Buscar Visita</label>
     <div class="col-11">
        <input id="nomeInst" class="form-control" type="text" name="instituicao" placeholder="Insira o Nome ou Cidade da Instituição" list="instList" required autofocus>
        <datalist id="instList">            
        </datalist>
    </div>     
    <button type="button" class="btn btn-primary float-left" buscar> Buscar </button>
</div>



<form method="get" action="#">
<div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>
    <table class="table-borderless col-12">
        
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
                    <th>Ano Escolar:</th> <td>1º Ano</td>
                </tr>
            </thead>
            
            <!--<thead>
                <tr class="table-primary">
                    <th colspan="4">Lista de Alunos:</th> 
                    <th colspan="2">Idade:</th>
                    
                </tr>
           
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Henrique Dias Oliveira </td> 
                    <td colspan="2">14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">Marcos Luís Barreto</td> 
                    <td colspan="2">13 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">João Bento Souza</td> 
                    <td colspan="2">14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">Juceline Arraes Mato</td> 
                    <td colspan="2">15 anos</td>
                </tr>
            </tbody> -->

        </table>
    </form>
    <button type="button" class="btn btn-secondary float-left" expand> Expandir </button>
</div>

<form method="get" action="#">
<div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>
    <table class="table-borderless col-12">
        
        <thead>
            <tr class="table-secondary">
                <th>Instituição:</th> <td>Colégio Municipal Odorico Tavares</td>
                <th>Cidade:</th> <td>Feira de Santana</td>
            </tr>
        </thead>


        <thead>
            <tr>
                <th>Data da Visita:</th> <td>14/11/2020</td>
                <th>Status:</th> <td>Não Realizada</td>
            </tr>
        </thead>

            <thead>
                <tr>
                    <th>Total de Alunos:</th> <td>20</td>
                    <th>Titular Responsável:</th> <td>Mário Luiz</td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Turno:</th> <td>Tarde</td>
                    <th>Ano Escolar:</th> <td>3º Ano</td>
                </tr>
            </thead>
            
            <!--<thead>
                <tr class="table-primary">
                    <th colspan="4">Lista de Alunos:</th> 
                    <th colspan="2">Idade:</th>
                    
                </tr>
           
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Henrique Dias Oliveira </td> 
                    <td colspan="2">14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">Marcos Luís Barreto</td> 
                    <td colspan="2">13 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">João Bento Souza</td> 
                    <td colspan="2">14 anos</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="2">Juceline Arraes Mato</td> 
                    <td colspan="2">15 anos</td>
                </tr>
            </tbody> -->

        </table>
    </form>
    <button type="button" class="btn btn-secondary float-left" expand> Expandir </button>
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
        height: 230px;
    }

    [expand]{
        margin-top: 5px;
        margin-left: 20px; 
        margin-right: 15px;
        width: 90px;
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


    td:first-child {
        border-left-width: 1px;
    }

</style>
@endsection
