@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')
<div class="matricula">
    <div class="form-row">
        <div class="col-6  float-right">
            <div class="form-group row">
                <label class="col-sm-12 col-form-label" nomeEstagiario >Nome do Estagiário</label>
                <div class="col-9">
                    <input id="nomeInst" class="form-control" type="text" name="estagiario" placeholder="Insira o Nome do Estagiário" list="instList" required autofocus>
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
                    
                    <th scope="col">Dia/Turno</th>
                    <th scope="col">Manhã</th>
                    <th scope="col">Tarde</th>
                    <th scope="col">Noite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-secondary">Segunda</th>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">18:00 - 22:00</button></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Terça</th>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">18:00 - 22:00</button></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quarta</th>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">18:00 - 22:00</button></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Quinta</th>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">18:00 - 22:00</button></td>
                </tr>
                <tr>
                    <th scope="row" class="table-secondary">Sexta</th>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button" aria-pressed="false">18:00 - 22:00</button></td>
                </tr>
            </tbody>
        </table>
</div>

    <div class="form-group">
        <input type="submit" value="Alterar" name="proposta" class="submit_button col-2">  <!--botao p/ confirmar os dados-->
        <input type="submit" value="Salvar" name="proposta" class="submit_button col-2">  <!--botao p/ confirmar os dados-->
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
        padding:20px 30px 0px 0px ;
    }

    .download {
        padding-left: 60px;
    }

    /*configurando design dos botões de salvar e alterar*/
    .submit_button{
        background-color: #007bff;
        position: absolute;
        left: 680px;
        color: white;
        border: 5px;
        border-radius: 5px;
        padding: 5px; 
    }

    /*configurando design do botão de download*/
    [download] {
        text-align: top;
        width: 200px;
        height: 40px;
        border:3px black;
        background: transparent url(/../img/logo-download.png) no-repeat;
        background-position: left 15% bottom 50%;
        background-size: 18px;
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