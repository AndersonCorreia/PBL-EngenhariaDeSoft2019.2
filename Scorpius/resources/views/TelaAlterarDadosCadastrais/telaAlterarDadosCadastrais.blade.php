@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Alterar Dados')

@section('conteudo')
<head>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<div class="scorpius-border p-4" onmousemove="verificaTel()">
    <div class="scorpius-border-shadow-sm p-3" onmousemove="verificaCPF()">
        <p class="h3">Dados pessoais</p>
        <form action="{{route('alterarDadosAlteracao.post')}}" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="nomeUsuario">Nome</label>
                    <input class="form-control nome-text" name="nome" id="nomeUsuario" placeholder="Nome" minlength="3"
                        maxlength="12" type="text" value ="{{isset($dadosUsuario['nome']) ? $dadosUsuario['nome'] : ''}}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="sobrenomeUsuario">Sobrenome</label>
                    <input class="form-control nome-text" name="sobrenome" id="sobrenomeUsuario" value="{{isset($dadosUsuario['sobrenome']) ? $dadosUsuario['sobrenome'] : ''}}"
                            placeholder="Sobrenome" minlength="3" maxlength="20" type="text" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="emailUsuario">Email</label>
                    <input disabled class="form-control" name="email" id="emailUsuario" value="{{isset($dadosUsuario['email']) ? $dadosUsuario['email'] : ''}}" placeholder="exemplo@exemplo.com"
                        type="email" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="telefoneUsuario">Telefone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+55</div>
                        </div>
                        <input required maxlength="14" minlength="14" type="text" value="{{isset($dadosUsuario['telefone']) ? $dadosUsuario['telefone'] : ''}}" 
                                name="telefone" onchange="verificaTel();" id="telefoneUsuario" class="form-control val" placeholder="(00) 0 0000-0000">
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="cpfUsuario">CPF</label>
                    <input minlength="14" maxlength="14" type="text" name="cpf" id="cpfUsuario" class="form-control val cpf-mask" onchange="verificaCPF();"
                            value="{{isset($dadosUsuario['cpf']) ? $dadosUsuario['cpf'] : ''}}" placeholder="000.000.000-00" required>
                    <small hidden id="feedback-cpf" class="text-danger">CPF inválido!</small>
                </div>
            </div>
            <div class="mb-5">
                <div class="aside">
                    <a id="btnCancelar1" type="submit" class="btn btn-secondary float-right" href="{{route('dashboardVisitante.show')}}" style="margin: 0px 0px 0px 5px">
                        Cancelar
                    </a>
                </div>
                <button type="submit" id="btnAlterar" class="btn btn-secondary float-right" action="{{route('alterarDadosAlteracao.post')}}">
                    Alterar dados
                </button>
            </div>
            <hr>
            <p class="h3">Alterar senha</p>
            <div class="form-group pl-5 pr-5">
                <label for="senhaAtual">Senha atual</label>
                <div class="form-row">
                    <input onchange="verificaCamposSenha()" minlength="6" maxlength="20" value="{{isset($dadosUsuario['senha']) ? $dadosUsuario['senha'] : ''}}"
                            class="form-control col-sm-11" name="senhaAtual" id="senhaAtual" type="password">
                    <button type="button" style="margin-left:5px" class="btn btn-warning" id="btnRevelaS" name="btnRevelaS" aria-hidden="false"><i class="fas fa-eye-slash" name ="iconS" id="iconS"></i> </button>
                </div>     
            </div>
            <div class="form-group pl-5 pr-5">
                <label for="novaSenha">Nova senha <b>*</b></label>
                <div class="form-row">
                    <input onchange="verificaCamposSenha()" minlength="6" maxlength="20" class="form-control col-sm-11" name="novaSenha" id="novaSenha" type="password">
                    <button type="button" style="margin-left:5px" class="btn btn-warning" id="btnRevelaNS1" name="btnRevelaNS1" aria-hidden="false"><i class="fas fa-eye-slash" name ="iconRS1" id="iconRS1"></i> </button>
                </div>    
            </div>
            <div class="form-group pl-5 pr-5">
                <label for="rptNovaSenha">Repetir nova senha <b>*</b></label>
                    <div class="form-row">
                        <input onchange="verificaCamposSenha()" minlength="6" maxlength="20" class="form-control col-sm-11" name="rptNovaSenha" id="rptNovaSenha" type="password">
                        <button type="button" style="margin-left:5px" class="btn btn-warning" id="btnRevelaNS2" name="btnRevelaNS2" aria-hidden="false"><i class="fas fa-eye-slash" name ="iconRS2" id="iconRS2"></i></button>
                    </div>
                <small hidden id="feedback-senha" class="text-danger">As senhas devem ser iguais!</small>
            </div>
            <div class="mb-5">
                    <div class="aside">
                        <a id="btnCancelar2" type="submit" class="btn btn-secondary float-right" href="{{route('dashboardVisitante.show')}}" style="margin: 0px 0px 0px 5px">
                            Cancelar
                        </a>
                    </div>
                <button onmousewheel="verificaCamposSenha()" hidden id="alterarSenha" type="submit" action="{{route('alterarDadosAlteracao.post')}}" class="btn btn-secondary float-right">
                    Alterar senha
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://unpkg.com/vanilla-masker@1.1.1/lib/vanilla-masker.js"></script>
<script>

jQuery(document).ready(function($) {        //Funcão pros botoes revelarem a senha ao passar o mouse
    $('#iconRS2').hover(function(e) {       // CONFIRMA NOVA SENHA
        e.preventDefault();
        if ( $('#rptNovaSenha').attr('type') == 'password' ) {
            $('#rptNovaSenha').attr('type', 'text');
            $('#iconRS2').attr('class', 'fas fa-eye');
        } else {
            $('#rptNovaSenha').attr('type', 'password');
            $('#iconRS2').attr('class', 'fas fa-eye-slash');
        }
    });

    $('#iconRS1').hover(function(e) {       // NOVA SENHA
        e.preventDefault();
        if ( $('#novaSenha').attr('type') == 'password' ) {
            $('#novaSenha').attr('type', 'text');
            $('#iconRS1').attr('class', 'fas fa-eye');
        } else {
            $('#novaSenha').attr('type', 'password');
            $('#iconRS1').attr('class', 'fas fa-eye-slash');
        }
    });

    $('#iconS').hover(function(e) {     //SENHA
        e.preventDefault();
        if ( $('#senhaAtual').attr('type') == 'password' ) {
            $('#senhaAtual').attr('type', 'text');
            $('#iconS').attr('class', 'fas fa-eye');
        } else {
            $('#senhaAtual').attr('type', 'password');
            $('#iconS').attr('class', 'fas fa-eye-slash');
        }
    });
});

function verificaCPF(){
    if($('#cpfUsuario').val() != ""){
        if( cpfInvalido()== true  ){
            $('#cpfUsuario').removeClass('is-valid');
            $('#cpfUsuario').addClass('is-invalid');
            $('#btnAlterar').attr("hidden", '');      //hide button
        }
        else{
            $('#cpfUsuario').removeClass('is-invalid');
            $('#cpfUsuario').addClass('is-valid');
            $('#btnAlterar').removeAttr("hidden");    //SHOW button
        }
    }
}

function verificaTel(){
    if($('#telefoneUsuario').val() != ""){         //SE NULO
        if( telInvalido()== true){                          //SE INVALIDO
            $('#telefoneUsuario').removeClass('is-valid');
            $('#telefoneUsuario').addClass('is-invalid');
            $('#btnAlterar').attr("hidden", '');      //hide button
        }
        else{                                                  //SE VALIDO
            $('#telefoneUsuario').removeClass('is-invalid');
            $('#telefoneUsuario').addClass('is-valid');
            $('#btnAlterar').removeAttr("hidden");        //show button
        }
    }
}

function verificaCamposSenha(){
    if($('#novaSenha').val() != "" || $('#rptNovaSenha').val() != ""){      //SE NAO NULO
        if ($('#novaSenha').val() != $('#rptNovaSenha').val()) {        //SE INVALIDO
            $('#rptNovaSenha').removeClass('is-valid');
            $('#novaSenha').removeClass('is-valid');
            $('#rptNovaSenha').addClass('is-invalid');
            $('#novaSenha').addClass('is-invalid');
            $('#alterarSenha').attr("hidden", '');      //hide button
        } else {                                            //SE VALIDO
            $('#novaSenha').removeClass('is-invalid');
            $('#novaSenha').addClass('is-valid');
            $('#rptNovaSenha').removeClass('is-invalid');
            $('#rptNovaSenha').addClass('is-valid');
            $('#alterarSenha').removeAttr("hidden");        //show button
        }
    }
    if($('#novaSenha').val() === $('#rptNovaSenha').val()){     //SE SENHAS NOVAS IGUAIS
            $('#novaSenha').removeClass('is-invalid');
            $('#novaSenha').addClass('is-valid');
            $('#rptNovaSenha').removeClass('is-invalid');
            $('#rptNovaSenha').addClass('is-valid');
            $('#alterarSenha').removeAttr("hidden");            //show button
    }
}

function inputHandler(masks, max, event) {          //Gerencia a mascara para o cpf e para telefone
    let c = event.target;
    let v = c.value.replace(/\D/g, '');            
    let m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

let telMask = ['(99) 99999-9999'];               //Mascara de telefone
let tel = document.querySelector('#telefoneUsuario');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);  

let cpfMask = ['999.999.999-99'];               //Mascara de cpf
let cpf = document.querySelector('#cpfUsuario');
VMasker(cpf).maskPattern(cpfMask[0]);
cpf.addEventListener('input', inputHandler.bind(undefined, cpfMask, 14), false); 

function cpfInvalido(){
    let cpf = $('#cpfUsuario').val();
    return  (cpf.length != 14 || cpf == "000.000.000-00" || cpf == "111.111.111-11" ||  
            cpf == "222.222.222-22" || cpf == "333.333.333-33" || cpf == "444.444.444-44" ||  
            cpf == "555.555.555-55" || cpf == "666.666.666-66" || cpf == "777.777.777-77" || 
            cpf == "888.888.888-88" || cpf == "999.999.999-99");
}

function telInvalido(){
    let tel = $('#telefoneUsuario').val();
    return  (tel.length != 15 || tel == "(00) 00000-0000" || tel == "(11) 11111-1111" ||  
            tel == "(22) 22222-2222" || tel == "(33) 33333-3333" || tel == "(44) 44444-4444" ||  
            tel == "(55) 55555-5555" || tel == "(66) 66666-6666" || tel == "(77) 77777-7777" || 
            tel == "(88) 88888-8888" || tel == "(99) 99999-9999");
}

$(".val").on("input", function() {      //Impede inserção de caracteres diferentes de * e substitui por ' '
    var regexp = /[^0-9-.]/g;           //*
    if (this.value.match(regexp)) {
        $(this).val(this.value.replace(regexp, ''));
    }
});

$(".nome-text").on("input", function() {       //Impede inserção de caracteres diferentes de * e substitui por ' '
    var regexp = /[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g;      //*
    if (this.value.match(regexp)) {
        $(this).val(this.value.replace(regexp, ''));
    }
});

</script>
@endsection