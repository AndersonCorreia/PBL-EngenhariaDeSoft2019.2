@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')
<div class="matricula">
    <div class="form-row">
        <div class="col-5  float-left">
            <div class="form-group row">
                <label class="col-sm-12 col-form-label">Nome do Estagiário</label>
                <div class="col-9">
                    <input id="nomeInst" class="form-control" type="text" name="estagiario" placeholder="Insira o Nome da instituicão" list="instList" required autofocus>
                    <datalist id="instList">
                        @if (($estagiarios ?? false))
                        @foreach ($estagiarios as $est)
                        <option class="opList" value="{{$est['nome']}}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <button type="button" class="btn btn-primary float-left " buscar> Buscar </button>
            </div>

        </div>

        <div class="col-4">
            <div class="input-group-append">
                <label>Comprovante de Matrícula</label>
                <button type="button" class="btn btn-secondary" download>Download</button>
            </div>
        </div>
    </div>



    <div class="calendario">
    <h5>Cronograma Semanal do Semestre</h5>
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        jQuery('[buscar]').click(e => {
            e.preventDefault() //evita ação de botão      
            $.get("{{route('retornaProposta', 12)}}",function(estagiarios){
                console.log(estagiarios)
            })
            /*jQuery.ajax({
                method:"GET",
                url: "confirmacaoHorario",
                data: { id:12 },
                success(data) {
                   console.log(data)
                }
            })*/
        })

    </script>
    @endsection
<style>

    h4{
        padding: 0px 30px 10px 30px;
    }
    .calendario{
        padding:50px 30px 0px 30px ;
    }

    .download {
        padding-left: 60px;
    }

    [download] {
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

    
    [buscar]{
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction:column;
        align-items: center;
    }

    /*Posição do botão do download */
    .input-group-append{
        padding: 0px 50px 0px 50px;
        display: flex;
        flex-direction:column;
        align-items: center;
    }

    table{
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-top: -4px;
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