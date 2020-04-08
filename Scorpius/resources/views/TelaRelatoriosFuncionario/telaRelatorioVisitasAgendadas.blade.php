@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Relatórios de Visitas Institucionais Agendadas')

@section('conteudo')


<div class="form-group row col-12" style="overflow-y: auto;">    
    <label class="col-sm-12 col-form-label pt-3" nomeInstituicao >Buscar Visita</label>
    <div class="col-9">
        <form action="{{route('buscarInstituicao')}}" method="post">
        {{ csrf_field() }}
            <input id="nomeInst" class="form-control" type="text" name="instituicao" 
            placeholder="Insira o Nome da Instituição" list="instList" required autofocus>
            <datalist id="instList">            
            </datalist>
    </div>     
            <button type="submit" class="btn btn-primary float-left" buscar> Buscar </button>
        </form>
    <button type="button" class="btn btn-danger float-left" data-toggle="modal"
    data-target=".modal-relatorio-estatistico" relatorio> Relatório Estatístico </button>
    <!-- modal do relatório estatístico -->
    <div class="modal fade modal-relatorio-estatistico" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modal-relatorio-estatistico">Relatório Estatístico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Somente exemplificando a estrutura -->
                    <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" style="overflow-y: auto;" modalEstatistico>
                        <!-- Espaço da tabela -->
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($agendamentos as $agendamento)
    <?php $id = $agendamento['agendamentoID']; ?>
    <form method="get" action="#"> <!--bloco começa aqui -->
@foreach($agendamentos ?? [] as $agendamento)
    
        <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" borda>
            <table class="table-borderless col-12">
                <thead>
                <!-- Somente exemplificando a estrutura -->
                    <tr class="table-secondary">
                        <th>Nome da Instituição:</th> <td nomeInstituicao >{{$agendamento['instituicao']}}</td>
                        <th>Cidade:</th> <td>{{$agendamento['cidade']}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Data da Visita:</th> <td>{{$agendamento['data']}}</td> <!-- Exemplo da estrutura -->
                        <th>Turno da Visita:</th> <td>{{$agendamento['turno']}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Status da Visita:</th> <td>{{$agendamento['visitaStatus']}}</td>
                        <th>Telefone da Instituição:</th> <td>{{$agendamento['instituicaoTelefone']}}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>Total de Alunos da Turma:</th> <td>{{$quant_visitantes[$id]}}</td>
                        <th>Responsável pela Turma:</th> <td>{{$agendamento['usuario']}}</td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Nível de Ensino da Turma:</th> <td>{{$agendamento['ensino']}}</td>
                        <th>Ano Escolar da Turma:</th> <td>{{$agendamento['ano_escolar']}}</td>
                    </tr>
                </thead>
            </table>
        <button type="button" class="btn btn-secondary float-left" data-toggle="modal" data-target="#modal{{$id}}" 
        expand>Dados Completos</button>
    </div>

        </form>
        <button type="button" class="btn btn-secondary float-left" data-toggle="modal" data-target="{{$id}}" 
        expand>Dados Completos</button>

        
        <button type="button" class="btn btn-secondary float-left" data-toggle="modal"
        data-target=".modal-dados-completos" expand>Dados Completos</button>
        <!-- modal dos dados completos -->
        <div class="modal fade" id="modal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" 
            aria-hidden="true">
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
                        <div class= "row mt-3 mx-2 p-3 scorpius-border-shadow border-top border-shadow" style="overflow-y: auto;" bordaModal>
                            <table class="table-borderless col-12">        
                                <thead>
                                    <tr class="table-secondary">
                                        <th>Nome da Instituição:</th> <td>{{$agendamento['instituicao']}}</td>
                                    </tr>
                                
                                    <tr>
                                        <th>Cidade:</th> <td>{{$agendamento['cidade']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Data da Visita:</th> <td>{{$agendamento['data']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Turno da Visita:</th> <td>{{$agendamento['turno']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Status da Visita:</th> <td>{{$agendamento['visitaStatus']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Telefone da Instituição:</th> <td>{{$agendamento['instituicaoTelefone']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Total de Alunos da Turma:</th> <td>{{$quant_visitantes[$id]}}</td>
                                    </tr>

                                    <tr>
                                        <th>Responsável pela Turma:</th> <td>{{$agendamento['usuario']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Nível de Ensino da Turma:</th> <td>{{$agendamento['ensino']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Ano Escolar da Turma:</th> <td>{{$agendamento['ano_escolar']}}</td> 
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
                                    @foreach($visitante[$id] as $visita)
                                        <tr>
                                            <td>{{$visita['nome']}}</td>
                                            <td>{{$visita['idade']}}</td>
                                        </tr>
                                    @endforeach
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
@endforeach


<style>

    [borda]{
        width: 1050px;
        height: auto;
    }

    [bordaModal]{
        width: 750px;
        height: 620px;
    }

    [modalEstatistico]{
        width: 750px;
        height: 300px;
        
    }
    
    [nomeInstituicao]{
        min-width: 340px;
    }

    [expand]{
        margin-top: 5px;
        margin-left: 20px; 
        margin-right: 15px;
        width: 155px;
        height: 40px;
    }

    [relatorio]{
        margin-left: 10px; 
        margin-right: 10px;
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
