@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Relatórios de Visitas Institucionais Agendadas')

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
    <button type="button" class="btn btn-secondary float-left" data-toggle="modal"
    data-target=".modal-dados-completos" expand>Dados Completos</button>
    
    <!-- modal dos dados completos -->
    <div class="modal fade modal-dados-completos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Dados Completos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Somente exemplificando a estrutura -->
                    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" bordaModal>
                        <table class="table-borderless col-12">        
                            <thead>
                                <tr class="table-secondary">
                                    <th>Nome da Instituição:</th> <td>Colégio Estadual Odorico Tavares</td>
                                </tr>
                               
                                <tr>
                                    <th>Cidade:</th> <td>Feira de Santana</td> <!-- Exemplo da estrutura -->
                                </tr>

                                <tr>
                                    <th>Data da Visita:</th> <td>28/11/2019</td>
                                </tr>

                                <tr>
                                    <th>Turno da Visita:</th> <td>Manhã</td>
                                </tr>

                                <tr>
                                    <th>Status da Visita:</th> <td>Realizada</td>
                                </tr>

                                <tr>
                                    <th>Telefone da Instituição:</th> <td>7531618000</td>
                                </tr>

                                <tr>
                                    <th>Total de Alunos da Turma:</th> <td>40</td>
                                </tr>

                                <tr>
                                    <th>Responsável pela Turma:</th> <td>Augusto Vicente</td>
                                </tr>

                                <tr>
                                    <th>Nível de Ensino da Turma:</th> <td> Ensino Médio</td>
                                </tr>

                                <tr>
                                    <th>Ano Escolar da Turma:</th> <td>1º Ano</td> 
                                </tr>
                            </thead>

                        </table>

                        <table class="table-borderless col-12">
                            <thead>
                                <tr class="table-warning">
                                    <th>Lista Completa de Alunos:</th> <td>              </td>
                                </tr>
                                   
                                <tr>
                                    <th>Nome:</th> <th>Idade:</th>
                                </tr>
    
                                <tr>
                                    <td>Idelvando Cerqueira</td> <td>20 anos</td>
                                </tr>
    
                                <tr>
                                    <td>Anderson Correia</td> <td>21 anos</td>
                                </tr>
    
                                <tr>
                                    <td>Esther Araújo</td> <td>21 anos</td>
                                </tr>
    
                                <tr>
                                    <td>Mariana Lima</td> <td>19 anos</td>
                                </tr>
    
                                <tr>
                                    <td>Papa Francisco</td> <td>70 anos</td>
                                </tr>
                            </thead>
    
                        </table>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>
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
