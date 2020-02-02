@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Turmas')
@section('css.head')
<style>
    @media only screen and (max-width: 580px) {
        .btn-excluir-turma {
            padding-left: 15px !important;
            -webkit-box-flex: 0 !important;
            flex: 0 0 auto !important;
            max-width: 100% !important;
            width: 27% !important;
        }

        .div-btn-turma {
            -webkit-box-flex: 0 !important;
            flex: 0 0 70% !important;
            max-width: 70% !important;
        }
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
            {{-- Botão cadastrar novas turmas --}}
            <a href="" id="cadastrar-turmas" class="btn btn-secondary">
                <i class="fas fa-plus-circle    "></i>
                Cadastrar nova turma e alunos
            </a>
        </div>
        <div id="parte-bottom">

            {{-- Titulo --}}
            <nav class="navbar navbar-light">
                <span class="navbar-brand mb-0 h1">Suas turmas: </span>
            </nav>
            {{-- Lista de turmas --}}
            <span aria-disabled="false" value=""></span>
            <div class="">
                @if($turmas['turmas']->num_rows == NULL)
                <div class="alert alert-secondary" role="alert">Não há turmas cadastradas.</div>
                @endif
                @foreach($turmas['turmas'] as $turma)
                {{-- EXCLUIR TURMA --}}
                <form class="mb-2" method="POST" action="{{ route('excluirTurma', ['0'=>$professor_ID]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-10 div-btn-turma">
                            <input type="hidden" name="turma_ID" value="{{$turma['ID']}}">
                            <input type="hidden" name="professor_ID" value="{{$professor_ID}}">
                            <button type="button" class="btn btn-secondary btn-turma btn-lg btn-block"
                                data-toggle="modal" data-target="#turma{{$turma['ID']}}">
                                {{$turma['nome']}}

                            </button>
                        </div>
                        <div class="btn-editar-excluir col-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#editarTurma{{$turma['ID']}}">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button type="submit" class=" btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="modal fade" id="editarTurma{{$turma['ID']}}" tabindex="-1" role="dialog"
                    aria-labelledby="editarTurma{{$turma['ID']}}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarTurma{{$turma['ID']}}Title">Editar turma
                                    <strong>{{$turma['nome']}}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('editarTurma', ['0'=>$professor_ID]) }}">
                                <div class="modal-body">
                                    {{-- EDITAR TURMA --}}

                                    @csrf
                                    <input name="turma_ID" type="hidden" value="{{$turma['ID']}}">
                                    <div class="container">
                                        <div>
                                            <label for="nome{{$turma['ID']}}">Nome</label>
                                            <input maxlength="10" minlength="1" value="{{$turma['nome']}}"
                                                placeholder="{{$turma['nome']}}" type="text" class="form-control"
                                                id="nome{{$turma['ID']}}" name="nomeTurma">
                                        </div>
                                        <div>
                                            <label for="anoEscolar{{$turma['ID']}}">Ano escolar</label>
                                            <input value="{{$turma['ano_escolar']}}"
                                                placeholder="{{$turma['ano_escolar']}}" type="text" class="form-control"
                                                id="anoEscolar{{$turma['ID']}}" name="anoEscolar">
                                        </div>
                                        <div>
                                            <label for="ensino{{$turma['nome']}}">Tipo de ensino</label>
                                            <select id="ensino{{$turma['nome']}}" name="ensino" class="form-control">
                                                <option value="{{$turma['ensino']}}" selected>{{$turma['ensino']}}
                                                </option>
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
                @endforeach
                {{-- Modals das turmas --}}
                <div id="modals">
                    @foreach($turmas['turmas'] as $turma)
                    <div class="modal fade" id="turma{{$turma['ID']}}" tabindex="-1" role="dialog"
                        aria-labelledby="{{$turma['ID']}}Title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <input type="hidden" value="{{$quantidade_alunos = 0}}">
                                    @foreach ($turmas['alunos'] as $aluno)
                                    @if($aluno['turma_ID'] == $turma['ID'])
                                    <input type="hidden" value="{{$quantidade_alunos++}}">
                                    @endif
                                    @endforeach
                                    <p class="h5 modal-title" id="{{$turma['ID']}}Title">{{$turma['nome']}} </p>
                                    <p class="h5 modal-title ml-5"> Quantidade: {{$quantidade_alunos}}</p>
                                    {{-- <p class="h6 modal-title">Escolaridade: {{$turma['ano_escolar']}}</p>
                                    <p class="h6 modal-title">Ensino: {{$turma['ensino']}}</h5>
                                        <input name="turma_ID" type="hidden" value="{{$turma['ID']}}"> --}}

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="container btn-lg btn-block">

                                    @if ($quantidade_alunos<40) <button type="button" class="btn btn-primary btn-block"
                                        data-toggle="collapse" href="#adcAlunoTurma{{$turma['ID']}}" role="button"
                                        aria-expanded="false" aria-controls="adcAlunoTurma{{$turma['ID']}}">
                                        Adicionar aluno
                                        </button>
                                        @endif
                                </div>
                                <div class="container">
                                    <div class="collapse" id="adcAlunoTurma{{$turma['ID']}}"
                                        style="width:100% !important">
                                        <form method="POST" action="{{ route('adicionarAluno', ['0'=>$professor_ID]) }}"
                                            class="">
                                            @csrf

                                            <input type="hidden" name="turma_ID" value="{{$turma['ID']}}">
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <div>
                                                        <input placeholder="Nome do aluno" type="text"
                                                            class="form-control" id="adcNomeAluno{{$turma['ID']}}"
                                                            name="nomeAluno">
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div>
                                                        <input placeholder="Idade" type="number" class="form-control"
                                                            id="adcIdadeAluno{{$turma['ID']}}" name="idadeAluno">
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-plus-circle    "></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($turmas['alunos'] as $aluno)
                                        @if($aluno['turma_ID'] == $turma['ID'])
                                        <li class="list-group-item mx-auto">
                                            {{-- EXCLUIR ALUNO --}}
                                            <form method="POST"
                                                action="{{ route('excluirAluno', ['0'=>$professor_ID]) }}">
                                                @csrf
                                                <input name="aluno_ID" type="hidden" value="{{$aluno['ID']}}">
                                                <div class="row">
                                                    <div class="col-md-auto">
                                                        <p class="h5">{{$aluno['nome']}}</p>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <p class="h5">{{$aluno['idade']}} anos</p>
                                                    </div>
                                                    <div class="col-md-auto float-right">
                                                        <button onclick="alertInputWrong()" type=""
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection