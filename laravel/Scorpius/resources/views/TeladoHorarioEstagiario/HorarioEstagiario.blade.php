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

                <b>Guia de Matrícula</b> 
                <input type="file"/> <br> <br>
                <b>Proposta de horario</b> <br>
                <b> Horário &emsp; Segunda-Feira &emsp; Terça-Feira &emsp; Quarta-Feira &emsp; Quinta-Feira &emsp; Sexta-Feira</b><br>
                <b>08:00 - 12:00 &emsp; Matutino &emsp; Matutino &emsp; Matutino &emsp; Matutino &emsp; Matutino </b> <br>
                <b>14:00 - 18:00 &emsp; Vespertino &emsp; Vespertino &emsp; Vespertino &emsp; Vespertino &emsp; Vespertino</b> <br>
                <b>18:00 - 22:00 &emsp; Noturno &emsp; Noturno &emsp; Noturno &emsp; Noturno &emsp; Noturno &emsp; Noturno </b> <br>

                <br> <br> <br>

                <label> <b>Observações:</b> </label> <br>
                <input type="text" name="Observacao" placeholder="Descrição">   <!--Caixa de texto de obsservação-->
                <br><br><br>
            
                <input type="submit" value="Enviar Proposta" name="proposta" class="submit_button">  <!--botao p/ enviar os dados-->
            </form>    

@endsection