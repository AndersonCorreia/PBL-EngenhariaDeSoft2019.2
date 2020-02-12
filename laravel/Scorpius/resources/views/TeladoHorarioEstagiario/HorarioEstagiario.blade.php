@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Demanda WEB')

@section('conteudo')
<style>
    .user_input_forms {
        text-align: center;
    }

    .submit_button {
        background-color: cornflowerblue;
        color: white;
        border: 5px;
        border-radius: 5px;
        padding: 5px;
    }
</style>
<h3>Minha Proposta de Horário</h3>
<br>

<div class="user_input_forms">
    <form action="{{ route('HorarioEstagiario.enviarHorario') }}" method="POST">
        {{csrf_field()}}

        <div class="guia">
            <span class="badge badge-pill badge-secondary">
                <h4>Guia de Matrícula</h4>
            </span>
            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
            <input name="guia" type="file" />
            <br><br><br>
        </div>

        <div class="calendario">
            <h5>PROPOSTA DE CARGA HORÁRIA SEMANAL</h5>
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
                        <td>
                            <label class="btn btn-outline-secondary btn-lg">
                                <input name="seg-manha" autocomplete="off" type="checkbox">
                                08:00 - 12:00
                            </label>
                        </td>
                        <td><button name="seg-tarde" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">14:00 - 18:00</button></td>
                        <td><button name="seg-noite" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">18:00 - 22:00</button></td>
                    </tr>


                    <tr>
                        <th scope="row" class="table-secondary">Terça</th>
                        <td><button name="ter-manha" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">08:00 - 12:00</button></td>
                        <td><button name="ter-tarde" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">14:00 - 18:00</button></td>
                        <td><button name="ter-noite" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">18:00 - 22:00</button></td>
                    </tr>

                    <tr>
                        <th scope="row" class="table-secondary">Quarta</th>
                        <td><button name="qua-manha" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">08:00 - 12:00</button></td>
                        <td><button name="qua-tarde" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">14:00 - 18:00</button></td>
                        <td><button name="qua-noite" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">18:00 - 22:00</button></td>
                    </tr>


                    <tr>
                        <th scope="row" class="table-secondary">Quinta</th>
                        <td><button name="qui-manha" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">08:00 - 12:00</button></td>
                        <td><button name="qui-tarde" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">14:00 - 18:00</button></td>
                        <td><button name="qui-noite"type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">18:00 - 22:00</button></td>
                    </tr>

                    <tr>
                        <th scope="row" class="table-secondary">Sexta</th>
                        <td><button name="sex-manha" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">08:00 - 12:00</button></td>
                        <td><button name="sex-tarde" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">14:00 - 18:00</button></td>
                        <td><button name="sex-noite" type="button" class="btn btn-outline-secondary btn-lg" data-toggle="button"
                                aria-pressed="false">18:00 - 22:00</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <br> <br>

        <div class="form-group">
            <label for="Observacao" placeholder="Descrição"><b>Observações:</b></label>
            <!--Caixa de texto de obsservação-->
            <textarea class="form-control" name="observacao" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success float-right" style="border-bottom-right-radius: 20px; 
                border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px">
            Enviar
            <i class="fa fa-send"></i>
        </button>
        <!--botao p/ enviar os dados-->
        {{-- <input type="submit" value="Enviar Proposta" name="proposta" class="submit_button">  <!--botao p/ enviar os dados--> --}}
    </form>

    @endsection
