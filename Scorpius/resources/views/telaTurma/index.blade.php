@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Turmas')
@section('css.head')
<style>
    @media only screen and (max-width: 580px) {
        .btn-editar-excluir {
            padding-left: 15px !important;
            -webkit-box-flex: 0 !important;
            flex: 0 0 auto !important;
            max-width: 100% !important;
            margin-top: 0% !important;
        }

        .div-btn-turma {
            -webkit-box-flex: 0 !important;
            flex: 0 0 70% !important;
            max-width: 70% !important;
        }

        .row-btn-turma {
            margin-bottom: 5% !important;
        }

        #btn-turma {
            height: 100%;
        }
    }

    #idade-aluno-info {
        float: right !important;
    }

    .btn-editar-excluir {
        width: 27% !important;
    }
</style>
@endsection
@section('conteudo')
<div class="container-fluid bg-white p-4"
    style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
    <div class="container-fluid">
        <div id="parte-top">
            {{-- Alertas --}}
            @if (session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
            @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            {{-- FIM - Alertas --}}

            {{-- Cadastrar novas turmas --}}
            <div class="cadastrar-turma">
                {{-- Botão cadastrar turma --}}
                <button type="button" class="btn btn-secondary" data-toggle="modal"
                    data-target=".modal-cadastrar-turmas">
                    <i class="fas fa-plus-circle"></i>
                    Cadastrar nova turma e alunos
                </button>
                {{-- Modal adicionar turma --}}
                <div class="modal fade modal-cadastrar-turmas" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        {{-- Conteudos do modal --}}
                        <form action="{{ route('turma.cadastrarTurma') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header bg-secondary text-white">
                                    <h5 class="modal-title" id="modal-cadastrar-turmaTitle">Cadastrar nova turma</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- Corpo do modal --}}
                                <div class="modal-body">
                                    {{-- Container - Form --}}
                                    <div class="container">
                                        <div class="form-row align-items-center border p-2 rounded bg-light"
                                            id="cadastrar-turmas-modal-topo">
                                            <div class="col-md-2">
                                                <span>Sobre turma:</span>
                                            </div>
                                            <div id="col-nome-turma" class="col-md-3">
                                                <input maxlength="20" minlength="1" placeholder="Nome da turma"
                                                    type="text" class="form-control" id="cadastrar-turma-nome-turma"
                                                    name="nomeTurma" required>
                                            </div>
                                            <div id="col-ano-turma" class="col-md-3">
                                                <input placeholder="Ano escolar" type="text" class="form-control"
                                                    id="cadastrar-turma-ano-turma" name="anoEscolar" required>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ensino"
                                                    id="cadastrar-turma-ensino-turma">
                                                    <option value="Ensino Fundamental" selected>Ensino Fundamental
                                                    </option>
                                                    <option value="Ensino Médio">Ensino Médio</option>
                                                    <option value="Ensino Técnico">Ensino Técnico</option>
                                                    <option value="Ensino Superior">Ensino Superior</option>
                                                </select>
                                            </div>
                                        </div><br>

                                        <div id="cadastrar-turma-inputs-alunos" class="form-row btn-block">
                                            <div class="btn-block bg-light border p-2 rounded">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Alunos da turma:
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input id="quantidade-alunos" name="quantidade_alunos"
                                                            type="hidden" value="5">
                                                        <span class="float-right btn btn-secondary"
                                                            id="quantidade-alunos-turma">Quantidade: 1</span>
                                                    </div>
                                                </div>
                                                {{-- <small id="helper" class="form-text text-muted">ATENÇÃO
                                                    <li>São no máx. 50 alunos e no min. 5.</li>
                                                    <li>Certifique-se de que preencheu todos os campos corretamente</li>
                                                </small> --}}

                                            </div>
                                            <ul class="list-group" id="lista-inputs-alunos">
                                                <li class="list-group-item bg-light inputs-alunos">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-md-9">
                                                            <input onclick="verificaTurma()" id="nomeAluno1"
                                                                placeholder="Nome do aluno" type="text"
                                                                class="form-control btn-block" class="adcNomeAluno"
                                                                name="nomeAluno1" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input onclick="verificaTurma()" id="idadeAluno1"
                                                                placeholder="Idade" type="number" max="99" min=1
                                                                class="form-control btn-block adcIdadeAluno"
                                                                name="idadeAluno1" required>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" 
                                                                class="btn btn-danger btn-remove float-right">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>                                                                
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="row mt-2">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-sm-6 pr-1">
                                                        </div>
                                                        <div class="col-sm-6 pl-1">
                                                            <button type="button" class="btn btn-primary float-right"
                                                                id="btn-clona">
                                                                Adicionar aluno
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- FIM - Container form --}}
                                </div>
                                {{-- FIM - Corpo do modal --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button onmouseover="cadastrar()" type="submit" class="btn btn-success">Cadastrar
                                        turma</button>
                                </div>
                            </div>
                        </form>

                        {{-- FIM - Conteudo do modal --}}
                    </div>
                </div>
                {{-- FIM - Modal adicionar turma --}}
            </div>
            {{-- FIM - Cadastrar novas turmas --}}
        </div>
        {{-- Lista de turmas --}}
        <div id="parte-bottom">

            {{-- Titulo --}}
            <nav class="navbar navbar-light">
                <span class="navbar-brand mb-0 h1">Suas turmas: </span>
            </nav>

            {{-- Listagem de turmas --}}
            <div class="lista-de-turmas">

                {{-- Condição caso não tenha nenhuma turma cadastrada --}}
                @if($turmas['turmas']->num_rows == NULL)
                <div class="alert alert-secondary" role="alert">Não há turmas cadastradas.</div>
                @endif
                <div class="row">
                    <div class="col-sm-10 div-btn-turma">
                    
                        <button disabled class="btn btn-white btn-block" style="padding-top: 8px; padding-bottom: 8px;padding-left: 16px; padding-right: 16px;">
                            <div class="row text-center">
                                <div class="col-md-4">NOME</div>
                                <div class="col-md-3">ANO ESCOLAR</div>
                                <div class="col-md-3">ENSINO</div>
                                <div class="col-md-2">ALUNOS</div>
                        </div>
                        </button>
                    </div>
                    
                </div>
                @foreach($turmas['turmas'] as $turma)

                {{--  Botões Editar/Excluir turma --}}
                <div class="row row-btn-turma">

                    {{-- Botão da turma --}}
                    <div class="col-sm-10 div-btn-turma">
                        <input type="hidden" name="professor_ID" value="{{$professor_ID}}">
                        <input type="hidden" value="{{$quantidade_alunos_1 = 0}}">
                        @foreach ($turmas['alunos'] as $aluno)
                        @if($aluno['turma_ID'] == $turma['ID'])
                        <input type="hidden" value="{{$quantidade_alunos_1++}}">
                        @endif
                        @endforeach
                        <button id="btn-turma" type="button" class="btn btn-outline-secondary btn-turma btn-lg btn-block"
                            data-toggle="modal" data-target="#turma{{$turma['ID']}}">
                            <div class="row text-center">
                                <div class="col-md-4">{{$turma['nome']}}</div>
                                <div class="col-md-3">{{$turma['ano_escolar']}}</div>
                                <div class="col-md-3">{{$turma['ensino']}}</div>
                                <div class="col-md-2">
                                    <span class="badge badge-secondary badge-pill">{{$quantidade_alunos_1}}</span>
                                </div>
                            </div>
                            
                        </button>
                    </div>

                    {{-- Botão editar/excluir --}}
                    <div class="btn-editar-excluir col-sm-2 mt-1">
                        <form class="mb-2" method="POST" action="{{ route('turma.excluirTurma') }}">
                            @csrf
                            <input type="hidden" name="turma_ID" value="{{$turma['ID']}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#editarTurma{{$turma['ID']}}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                {{-- FIM - Botões Editar/Excluir turma --}}

                {{-- Modal Editar Turma --}}
                <div class="modal fade" id="editarTurma{{$turma['ID']}}" tabindex="-1" role="dialog"
                    aria-labelledby="editarTurma{{$turma['ID']}}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">

                                {{-- Titulo Modal --}}
                                <h5 class="modal-title" id="editarTurma{{$turma['ID']}}Title">Editar turma
                                    <strong>{{$turma['nome']}}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{-- Formulario editar turma --}}
                            <form method="POST" action="{{ route('turma.editarTurma') }}">
                                <div class="modal-body">
                                    @csrf
                                    <input name="turma_ID" type="hidden" value="{{$turma['ID']}}">
                                    <div class="container">

                                        {{-- Nome da turma --}}
                                        <div>
                                            <label for="nome{{$turma['ID']}}">Nome</label>
                                            <input maxlength="10" minlength="1" value="{{$turma['nome']}}"
                                                placeholder="{{$turma['nome']}}" type="text" class="form-control"
                                                id="nome{{$turma['ID']}}" name="nomeTurma" required>
                                        </div>

                                        {{-- Ano escolar --}}
                                        <div>
                                            <label for="anoEscolar{{$turma['ID']}}">Ano escolar</label>
                                            <input value="{{$turma['ano_escolar']}}"
                                                placeholder="{{$turma['ano_escolar']}}" type="text" class="form-control"
                                                id="anoEscolar{{$turma['ID']}}" name="anoEscolar" required>
                                        </div>

                                        {{-- Tipo de ensino --}}
                                        <div>
                                            <label for="ensino{{$turma['nome']}}">Tipo de ensino</label>
                                            <select id="ensino{{$turma['nome']}}" name="ensino" class="form-control">
                                                <option value="{{$turma['ensino']}}" selected>{{$turma['ensino']}}
                                                </option>
                                                {{-- Condições para mostrar o tipo de ensino da turma selecionado --}}
                                                @if($turma['ensino'] == 'Ensino Fundamental')
                                                <option value="Ensino Médio">Ensino Médio</option>
                                                <option value="Ensino Técnico">Ensino Técnico</option>
                                                <option value="Ensino Superior">Ensino Superior</option>
                                                @elseif($turma['ensino'] == 'Ensino Médio')
                                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                                <option value="Ensino Técnico">Ensino Técnico</option>
                                                <option value="Ensino Superior">Ensino Superior</option>
                                                @elseif($turma['ensino'] == 'Ensino Técnico')
                                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                                <option value="Ensino Médio">Ensino Médio</option>
                                                <option value="Ensino Superior">Ensino Superior</option>
                                                @elseif($turma['ensino'] == 'Ensino Superior')
                                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                                <option value="Ensino Médio">Ensino Médio</option>
                                                <option value="Ensino Técnico">Ensino Técnico</option>
                                                @endif
                                            </select>
                                        </div>
                                        {{-- FIM - Tipo de ensino --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- FIM - Modal editar turma --}}
                @endforeach
                {{-- Modal da informação das turmas --}}
                <div id="modals">
                    @foreach($turmas['turmas'] as $turma)
                    <div class="modal fade" id="turma{{$turma['ID']}}" tabindex="-1" role="dialog"
                        aria-labelledby="{{$turma['ID']}}Title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-secondary text-white">
                                    <input type="hidden" value="{{$quantidade_alunos = 0}}">
                                    @foreach ($turmas['alunos'] as $aluno)
                                    @if($aluno['turma_ID'] == $turma['ID'])
                                    <input type="hidden" value="{{$quantidade_alunos++}}">
                                    @endif
                                    @endforeach
                                    {{-- Titulo do modal --}}
                                    <p class="h5 modal-title" id="{{$turma['ID']}}Title">{{$turma['nome']}} </p>
                                    <p class="h5 modal-title ml-5"> Quantidade: {{$quantidade_alunos}}</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="container btn-lg btn-block">
                                    {{-- Condição caso a turma já tenha 40 alunos. Impede de adicionar mais --}}
                                    @if ($quantidade_alunos<40) <button type="button" class="btn btn-primary btn-block"
                                        data-toggle="collapse" href="#adcAlunoTurma{{$turma['ID']}}" role="button"
                                        aria-expanded="false" aria-controls="adcAlunoTurma{{$turma['ID']}}">
                                        Adicionar aluno
                                        </button>
                                        @endif
                                </div>
                                {{-- Campos de adicionar novo aluno --}}
                                <div class="container">
                                    <div class="collapse" id="adcAlunoTurma{{$turma['ID']}}"
                                        style="width:100% !important">
                                        <form method="POST" action="{{ route('turma.adicionarAluno') }}">
                                            @csrf
                                            <input type="hidden" name="turma_ID" value="{{$turma['ID']}}">
                                            <div class="form-row align-items-center">
                                                {{-- Nome do aluno --}}
                                                <div class="col-md-5">
                                                    <div>
                                                        <input placeholder="Nome do aluno" type="text"
                                                            class="form-control" id="adcNomeAluno{{$turma['ID']}}"
                                                            name="nomeAluno" required>
                                                    </div>
                                                </div>
                                                {{-- Idade do aluno --}}
                                                <div class="col-md-5">
                                                    <div>
                                                        <input placeholder="Idade" type="number" class="form-control"
                                                            id="adcIdadeAluno{{$turma['ID']}}" name="idadeAluno" required>
                                                    </div>
                                                </div>
                                                {{-- Submit do formulario --}}
                                                <div class="col-md-2 text-center">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-plus-circle    "></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- FIM - Campos de adicionar novo aluno --}}

                                {{-- Lista de alunos da turma --}}
                                <div class="modal-body">
                                    <ul class="list-group">
                                        @foreach ($turmas['alunos'] as $aluno)
                                        @if($aluno['turma_ID'] == $turma['ID'])
                                        <li class="list-group-item mx-auto" style="width: 100% !important">
                                            <form method="POST" action="{{ route('turma.excluirAluno') }}">
                                                @csrf
                                                <input name="aluno_ID" type="hidden" value="{{$aluno['ID']}}">
                                                <div class="row">
                                                    <div class="col-md-4 mx-auto">
                                                        <p class="h5 float-left">{{$aluno['nome']}}</p>
                                                    </div>
                                                    <div class="col-md-4 mx-auto">
                                                        @if ($aluno['idade'] <10) <p class="h5 float-right">
                                                            {{$aluno['idade']}} ano</p>
                                                            @else
                                                            <p class="h5 float-right">{{$aluno['idade']}} anos</p>
                                                            @endif
                                                    </div>
                                                    @if($quantidade_alunos > 1)
                                                    <div class="col-md-4 mx-auto">
                                                        <input type="hidden" name="quantidade_alunos" value="{{$quantidade_alunos}}">
                                                        <button type="submit" class="btn btn-danger float-right">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </form>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- FIM - Lista de alunos da turma --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- FIM - Modal informações das turmas --}}
            </div>
        </div>
        {{-- FIM - Listagem de turmas --}}
    </div>
    @endsection
    @section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
    <script>
        $(document).ready(function(){
        //     // for(var i = 1; i == 1; i++){
        //         // adicionar();
        //     // }
            return;
        });
        function verificaTurma(){
            if($('#cadastrar-turma-nome-turma').val() == ''){
                $('#cadastrar-turma-nome-turma').removeClass("is-valid");
                $('#cadastrar-turma-nome-turma').addClass("is-invalid");
            }else{
                $('#cadastrar-turma-nome-turma').removeClass("is-invalid");
                $('#cadastrar-turma-nome-turma').addClass("is-valid");
            }
            if($('#cadastrar-turma-ano-turma').val() == ''){
                $('#cadastrar-turma-ano-turma').removeClass("is-valid");
                $('#cadastrar-turma-ano-turma').addClass("is-invalid");
            }else{
                $('#cadastrar-turma-ano-turma').removeClass("is-invalid");
                $('#cadastrar-turma-ano-turma').addClass("is-valid");
            }
            var cont = parseInt($('#quantidade-alunos-turma').text().replace('Quantidade: ', ''));
            
            for(var i = 1; i < cont+1; ++i){
                
                if($('#nomeAluno' + i).val() == ''){                    
                    $('#nomeAluno' + i).removeClass("is-valid");
                    $('#nomeAluno' + i).addClass("is-invalid");
                }else{
                    $('#nomeAluno' + i).removeClass("is-invalid");
                    $('#nomeAluno' + i).addClass("is-valid");
                } 
                if($('#idadeAluno' + i).val() == ''){
                    $('#idadeAluno' + i).removeClass("is-valid");
                    $('#idadeAluno' + i).addClass("is-invalid");
                }else{
                    $('#idadeAluno' + i).removeClass("is-invalid");
                    $('#idadeAluno' + i).addClass("is-valid");
                } 
            }
            let nome = document.getElementById("cadastrar-turma-nome-turma");
            let ano = document.getElementById("cadastrar-turma-ano-turma");
            if(nome.value == ""){
                // return alert("Não esqueca de preencher o NOME da turma!");
            }
            if(ano.value == ""){
                // return alert("Não esqueca de preencher o ANO ESCOLAR da turma!");
            }
        }
        function adicionar(){
            var element = $('.inputs-alunos:last').clone();
            var cont = element.children('.form-row').children('.col-md-9').children('input').attr('name').replace('nomeAluno', '');
            if(cont > 49){
                return alert('Quantidade máxima de alunos numa turma atingida')
            }
            element.children('.form-row').children('.col-md-9').children('input').attr('name', 'nomeAluno' + (++cont));
            element.children('.form-row').children('.col-md-2').children('input').attr('name', 'idadeAluno' + (cont));
            element.children('.form-row').children('.col-md-9').children('input').attr('id', 'nomeAluno' + (cont));
            element.children('.form-row').children('.col-md-2').children('input').attr('id', 'idadeAluno' + (cont));
            element.children('.form-row').children('.col-md-9').children('input').val('');
            element.children('.form-row').children('.col-md-2').children('input').val('');
            $('#lista-inputs-alunos').append(element);
            $('#quantidade-alunos').val(cont);
            return $('#quantidade-alunos-turma').text('Quantidade: ' + cont);
        }
        // function remover(e){
        //     e.preventDefault();            
        //     if ($('.inputs-alunos').length > 5){
        //         $(this).parents('.inputs-alunos').remove();
        //         var cont = $('#quantidade-alunos-turma').text().replace('Quantidade: ', '');
        //         $('#quantidade-alunos').val(--cont);
        //         return $('#quantidade-alunos-turma').text('Quantidade: ' + (cont));
        //     }
        // }
        // $('form').on('click', '.btn-remove', function(e){
        //     e.preventDefault();
        //     if ($('.form-row').length > 5){
        //         $(this).parents('.box').remove();
        //     }
        // });
        $('#btn-clona').on("click", adicionar);
        // $('.btn-remove').on("click", remover);

        $('form').on('click', '.btn-remove', function(e){
            e.preventDefault();
            if ($('.inputs-alunos').length > 1){
                $(this).parents('.form-row').parents('.inputs-alunos').remove();
                var cont = $('#quantidade-alunos-turma').text().replace('Quantidade: ', '');
                $('#quantidade-alunos').val(--cont);
                return $('#quantidade-alunos-turma').text('Quantidade: ' + (cont));
            }
        });

        function cadastrar(){
            var trava = 0;
            if($('#cadastrar-turma-nome-turma').val() == ''){
                ++trava;
                $('#cadastrar-turma-nome-turma').removeClass("is-valid");
                $('#cadastrar-turma-nome-turma').addClass("is-invalid");
            }else{
                $('#cadastrar-turma-nome-turma').removeClass("is-invalid");
                $('#cadastrar-turma-nome-turma').addClass("is-valid");
            }
            if($('#cadastrar-turma-ano-turma').val() == ''){
                ++trava;
                $('#cadastrar-turma-ano-turma').removeClass("is-valid");
                $('#cadastrar-turma-ano-turma').addClass("is-invalid");
            }else{
                $('#cadastrar-turma-ano-turma').removeClass("is-invalid");
                $('#cadastrar-turma-ano-turma').addClass("is-valid");
            }
            var cont = parseInt($('#quantidade-alunos-turma').text().replace('Quantidade: ', ''));
            
            for(var i = 1; i < cont+1; ++i){
                
                if($('#nomeAluno' + i).val() == ''){
                    ++trava;                    
                    $('#nomeAluno' + i).removeClass("is-valid");
                    $('#nomeAluno' + i).addClass("is-invalid");
                }else{
                    $('#nomeAluno' + i).removeClass("is-invalid");
                    $('#nomeAluno' + i).addClass("is-valid");
                } 
                if($('#idadeAluno' + i).val() == ''){
                    ++trava;
                    $('#idadeAluno' + i).removeClass("is-valid");
                    $('#idadeAluno' + i).addClass("is-invalid");
                }else{
                    $('#idadeAluno' + i).removeClass("is-invalid");
                    $('#idadeAluno' + i).addClass("is-valid");
                } 
            }
            if(trava>0){
                // alert("Por favor, preencha todos os campos!");
            }
        }
    </script>
    @endsection