@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Bem-vindo(a), Administrador!')

@section('conteudo')

<style>
    .notificacoes_agendamentos {
        padding: 10px;
    }

    .scroll {
        max-height: 300px;
        overflow-y: auto;
        padding: 10px;
    }

    .card-body {
        height: 300px;
    }

    .card {
        height: 300px;
    }

    .coluna_calendario {
        float: middle;
    }

    .container-fluid {
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }
</style>




@endsection