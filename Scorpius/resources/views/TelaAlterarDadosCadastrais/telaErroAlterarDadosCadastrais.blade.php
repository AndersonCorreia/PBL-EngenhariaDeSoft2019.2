@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Alterar dados')

@section('conteudo')
<div class="scorpius-border p-4">
    <div class="scorpius-border-shadow-sm p-3" onmousemove="verificaCamposPessoais()">
        <p class="h3">Dados pessoais</p>
        <form action="{{}}" method="POST">
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="nomeUsuario">Nome</label>
                    <input class="form-control" name="nome" id="nomeUsuario" placeholder="Nome" minlength="3"
                        maxlength="10" type="text" value ="{{isset($dadosUsuario['nome']) ? $dadosUsuario['nome'] : ''}}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="sobrenomeUsuario">Sobrenome</label>
                    <input class="form-control" name="sobrenome" id="sobrenomeUsuario" value="{{isset($dadosUsuario['sobrenome']) ? $dadosUsuario['sobrenome'] : ''}}"
                            placeholder="Sobrenome" minlength="3" maxlength="10" type="text" required>
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
                        <input required maxlength="16" minlength="16" type="text" value="{{isset($dadosUsuario['telefone']) ? $dadosUsuario['telefone'] : ''}}" name="telefone" id="telefoneUsuario"
                            class="form-control" placeholder="(00) 0 0000-0000">
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="cpfUsuario">CPF</label>
                    <input onkeydown="javascript: fMasc( this, mCPF );" minlength="14" maxlength="14" type="text" name="cpf" id="cpfUsuario"
                        class="form-control cpf-mask" value="{{isset($dadosUsuario['cpf']) ? $dadosUsuario['cpf'] : ''}}" placeholder="000.000.000-00" required>
                <small hidden id="feedback-cpf" class="text-danger">CPF inválido!</small>

                </div>
            </div>
            <div class="mb-5">
                <div class="aside">
                    <button id="btnCancelar1" type="submit" class="btn btn-secondary float-right" href="Dashboard_visitante.blade.php" style="margin: 0px 0px 0px 5px">
                        Cancelar
                    </button>
                </div>
                <button type="submit" class="btn btn-secondary float-right" onmousewheel="verificaCamposPessoais()">
                    Alterar dados
                </button>
            </div>
        </form>
    </div>
    <div class="mt-3 scorpius-border-shadow-sm p-4" onmousemove="verificaCamposSenha()">
        <p class="h3">Alterar senha</p>
        <form action="" method="post">
            <div class="form-group pl-5 pr-5">
                <label for="senhaAtual">Senha atual</label>
                <input onchange="verificaCamposSenha()" minlength="6" maxlength="8" value="{{isset($dadosUsuario['senha']) ? $dadosUsuario['senha'] : ''}}" 
                    class="form-control" name="senha_atual" id="senhaAtual" type="password" required>
            </div>
            <div class="form-group pl-5 pr-5">
                <label for="novaSenha">Nova senha</label>
                <input onchange="verificaCamposSenha()" minlength="6" maxlength="8" class="form-control" name="nova_Senha" id="novaSenha" type="password">
            </div>
            <div class="form-group pl-5 pr-5">
                <label for="novaSenhaR">Repetir nova senha</label>
                <input onchange="verificaCamposSenha()" minlength="6" maxlength="8" class="form-control" id="rptNovaSenha" type="password">
                <small hidden id="feedback-senha" class="text-danger">As senhas devem ser iguais!</small>
            </div>
            <div class="mb-5">
                    <div class="aside">
                        <button id="btnCancelar2" type="submit" class="btn btn-secondary float-right" href="{{route('dashboardVisitante.show')}}" style="margin: 0px 0px 0px 5px">
                            Cancelar
                        </button>
                    </div>
                <button onmousewheel="verificaCamposSenha()" hidden id="alterarSenha" type="submit" class="btn btn-secondary float-right">
                    Alterar senha
                </button>
            </div>
        </form>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="row cadastro">
                    <p class="h3">Erro nas atualizações dos dados pessoais!</p>
                    <a class="btn btn-primary" href="/dashboard"> Início</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

?>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script>
//     $('#cpfUsuario').mask('000.000.000-00', {
//     reverse: true
// });
$('#telefoneUsuario').mask('00 0 0000-0000', {
    reverse: true
});
function verificaCamposPessoais(){
    if($('#cpfUsuario').val() != ""){
        if(ValidaCPF()){
            $('#feedback-senha').removeAttr("hidden");
            $('#cpfUsuario').removeClass('is-valid');
            $('#cpfUsuario').addClass('is-invalid');
        }else{
            $('#feedback-senha').attr("hidden", '');
            $('#cpfUsuario').removeClass('is-invalid');
            $('#cpfUsuario').addClass('is-valid');
        }
    }
}
function verificaCamposSenha(){
    trava = 0;
    if($('#novaSenha').val() != "" || $('#rptNovaSenha').val() != ""){
        if ($('#novaSenha').val() != $('#rptNovaSenha').val()) {
            $('#rptNovaSenha').removeClass('is-valid');
            $('#novaSenha').removeClass('is-valid');
            $('#rptNovaSenha').addClass('is-invalid');
            $('#novaSenha').addClass('is-invalid');
            $('#feedback-senha').removeAttr("hidden");
            trava++;
        } else {
            $('#novaSenha').removeClass('is-invalid');
            $('#novaSenha').addClass('is-valid');
            $('#rptNovaSenha').removeClass('is-invalid');
            $('#rptNovaSenha').addClass('is-valid');
            $('#feedback-senha').attr("hidden", '');
        }
    }
    
    if (trava == 0) {
        $('#alterarSenha').removeAttr("hidden");
    } else {
        $('#alterarSenha').attr("hidden", '');
    }
}
function ValidaCPF(){	
	var RegraValida=document.getElementById("cpfUsuario").value; 
	var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
    if (cpfValido.test( ) == true)	{ 
        return false;	
    } else	{	 
        return true	
    }
}
function fMasc(objeto,mascara) {
    obj=objeto
    masc=mascara
    setTimeout("fMascEx()",1)
}

function fMascEx() {
    obj.value=masc(obj.value)
}

function mCPF(cpf){
    cpf=cpf.replace(/\D/g,"")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return cpf
}
</script>
@endsection