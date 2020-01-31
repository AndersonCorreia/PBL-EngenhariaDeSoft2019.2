@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Turmas')

@section('conteudo')
<div class="container">
    <div id="parte-top">
        {{-- Botão cadastrar novas turmas --}}
        <a href="" id="cadastrar-turmas" class="btn btn-secondary">
            <i class="fas fa-plus-circle    "></i>
            Cadastrar novas turmas
        </a>
    </div>
    <div id="parte-bottom">
        {{-- Titulo --}}
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Suas turmas:</span>
        </nav>
        {{-- Lista de turmas --}}
        <span aria-disabled="false" value=""></span>
        <div class="list-group">
            @foreach($turmas['turmas'] as $turma)
            <form method="POST" action="{{ route('excluirTurma', ['0'=>$professor_ID]) }}">
                @csrf
                
                <input type="hidden" name="turma" value="{{$turma['ID']}}">
                <input type="hidden" name="professor_ID" value="{{$professor_ID}}">
                <button type="button" class="btn btn-primary list-group-item list-group-item-action active"
                    data-toggle="modal" data-target="#turma{{$turma['ID']}}">
                    {{$turma['nome']}}
                    <button type="submit" class="btn btn-danger">

                        <i class="fas fa-trash    "></i>
                    </button>
                </button>
            </form>
            @endforeach
        </div>
        {{-- Modals das turmas --}}
        <div id="modals">
            @foreach($turmas['turmas'] as $turma)
            <div class="modal fade" id="turma{{$turma['ID']}}" tabindex="-1" role="dialog"
                aria-labelledby="{{$turma['ID']}}Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{$turma['ID']}}Title">{{$turma['nome']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- {{dd($turmas['alunos'])}} --}}
                            @foreach ($turmas['alunos'] as $aluno)
                            
                            @if($aluno['turma_ID'] == $turma['ID'])
                            {{$aluno['nome']}}
                            <div></div>
                            @endif

                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection