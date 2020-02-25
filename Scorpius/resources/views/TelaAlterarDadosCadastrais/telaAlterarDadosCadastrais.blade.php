@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Alterar Dados Pessoais')

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
    <h1>Alterar Dados Pessoais</h1>
    <br>
        <div class="user_input_forms">
            <form action="AlterarDadosUsuario " method="POST">
            {{csrf_field()}}
                <label> <b>Email:</b> </label> <br>
                <input type="text" name="email" placeholder="Meu e-mail">   <!--Caixa de texto p/ atualziar email-->
                <br><br><br>
            
                <label> <b>Nome Completo:</b> </label> <br>
                <input type="text" name="nome" placeholder="Meu nome completo">      <!--Caixa de texto p/ atualizar nome-->
                <br><br><br>

                <label> <b>Telefone:</b> </label> <br>
                <input type="text" name="telefone" placeholder="Meu telefone">       <!--Caixa de texto p/ atualziar telefone-->
                <br><br><br>
                <input type="submit" value="Atualizar Dados" name="atualizar" class="submit_button">  <!--botao p/ confirmar os novos dados-->
            </form>    
        </div> <br><br>
        <div class="user_input_forms">
            <h1><b>Alterar Senha</b></h1>
            <form action="AlterarDadosUsuario" method="POST">
            {{csrf_field()}}
                <label><b>Digite sua senha atual:</b></label> <br>  
                <input type="password" name ="senha_antiga">  <!--Caixa de texto p/ senha atual-->
                <br><br><br>

                <label><b>Digite sua nova senha*:</b></label> <br>   
                <input type="password" name ="senha_nova"> <br>  <!--Caixa de texto p/ nova senha-->

                <h5>*Mínimo 8 dígitos</h5>   <br>
                <input type="submit" value="Alterar senha" name="alterar_senha" class="submit_button">  <!--botao p/ confirmar os novos dados-->
            </form>
        </div>
@endsection