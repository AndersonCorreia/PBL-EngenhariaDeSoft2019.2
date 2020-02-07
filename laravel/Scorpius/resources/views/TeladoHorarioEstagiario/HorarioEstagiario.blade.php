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
    <h1>Proposta de Horário</h1>
    <br>
        <div class="user_input_forms">
            <form action="horarioEstagiario " method="POST">
            {{csrf_field()}}

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
                <br> <br> <br>

                <label> <b>Observações:</b> </label> <br>
                <input type="text" name="Observacao" placeholder="Descrição">   <!--Caixa de texto de obsservação-->
                <br><br><br>
            
                <input type="submit" value="Enviar Proposta" name="proposta" class="submit_button">  <!--botao p/ enviar os dados-->
            </form>    

@endsection