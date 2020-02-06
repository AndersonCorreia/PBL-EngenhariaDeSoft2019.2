@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Horários dos estagiários - Funcionário')

@section('conteudo')
<div class="matricula">
    <div class="col-md-5 col-sm-9 m-0 p-0 float-sm-left">
        <h4>NOME DO ESTAGIÁRIO</h4>
        <input id="nomeInst" class="form-control" type="text" name="Instituicao" placeholder="Insira o Nome da instituicão" list="instList" required autofocus>
        <datalist id="instList">
            @if (($estagiarios ?? false))
            @foreach ($estagiarios as $est)
            <option class="opList" value="{{$est['nome']}}">
                @endforeach
                @endif
        </datalist>
    </div>
    <div class="input-group-append">
        <h4>COMPROVANTE DE MATRÍCULA</h4>
        <button type="button" class="btn btn-secondary">Download</button>
    </div>

    <div class="calendario">
    <h4>CRONOGRAMA SEMANAL DO SEMESTRE</h4>
    <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Manhã</th>
                    <th scope="col">Tarde</th>
                    <th scope="col">Noite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-secondary">Segunda</th>
                    <td id="segundaManha"></td>
                    <td id="segundaTarde"></td>
                    <td id="segundaNoite"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Terça</th>
                    <td id="tercaManha"></td>
                    <td id="tercaTarde"></td>
                    <td id="tercaNoite"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quarta</th>
                    <td id="quartaManha"></td>
                    <td id="quartaTarde"></td>
                    <td id="quartaNoite"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quinta</th>
                    <td id="quintaManha"></td>
                    <td id="quintaTarde"></td>
                    <td id="quintaNoite"></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Sexta</th>
                    <td id="sextaManha"></td>
                    <td id="sextaTarde"></td>
                    <td id="sextaNoite"></td>
                </tr>
            </tbody>
        </table>
</div>
@endsection

<script>

</script>
<style>

    h4{
        padding: 0px 0px 10px 0px;
    }
    .calendario{
        padding:50px 0px 0px 0px ;
    }

    .download {
        padding-left: 40px;
    }

    .btn {
        text-align: top;
        width: 200px;
        height: 40px;
        border:3px black;
        background: transparent url(/../img/logo-download.png) no-repeat center center;
        overflow: hidden;
        cursor: pointer;
        /* vai por o cursor como forma de mão ao passar por cima do botão */
        cursor: hand;
        /* para o IE 5.x */
    }
    .input-group-append{
        padding: 0px 0px 0px 50px;
        display: flex;
        flex-direction:column;
        align-items: center;
    }

    table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -8px;
        text-align: center;
    }

    td {
        border-left-width: 0;
        min-width: 120px;
        height: 50px;
    }

    td:first-child {
        border-left-width: 1px;
    }

   
</style>