@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Demanda WEB')

@section('conteudo')
    <style>
        .user_input_forms{
            text-align: center;
        }
        .submit_button{
            background-color: cornflowerblue;
            color: white;
            border: 5px;
            border-radius: 5px;
            padding: 5px; 
        }
    </style>
    <h3>Minha Proposta de Horário</h3>
    <br>

        <div class="guia">
        <span class="badge badge-pill badge-secondary"><h4>Guia de Matrícula</h4></span>
        <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
        <input type="file"/>
        <br><br><br>
        </div>

        <div class="user_input_forms">
            <form action="horarioEstagiario " method="POST">
            {{csrf_field()}}
        

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
                <br> <br> 

                <div class="form-group">
                <label for="Observacao" placeholder="Descrição"><b>Observações:</b></label>  <!--Caixa de texto de obsservação-->
                <textarea class="form-control" name="Observacao" rows="3"></textarea>
                </div>
            
                <input type="submit" value="Enviar Proposta" name="proposta" class="submit_button">  <!--botao p/ enviar os dados-->
            </form>    

@endsection