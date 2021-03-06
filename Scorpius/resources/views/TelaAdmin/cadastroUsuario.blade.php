@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Cadastro de Usuário')

@section('conteudo')

@if($errors->any())
<ul>
  @foreach($errors->all() as $eror)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif

<div class="scorpius-border p-4">
  <div class="scorpius-border-shadow-sm p-3"  onmousemove="verificaCamposPessoais()">
    <p class="h3">Cadastro de Usuário</p>
    <form method="POST" action={{ route("store.post") }}>
      {{csrf_field()}}
      <div class="form-row">
          <div class="col-md-6 form-group">
              <label for="nome">Nome</label>
              <input class="form-control nome-text" name="nome" id="nome" placeholder="Nome" minlength="3" maxlength="12" type="text" required>
          </div>
          <div class="col-md-6 form-group">
              <label for="sobrenome">Sobrenome</label>
              <input class="form-control nome-text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" minlength="3" maxlength="20" type="text" required>
          </div>
      </div>

      <div class="form-row">
          <div class="col-md-4 form-group">
              <label for="email">Email</label>
              <input class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" type="email" required>
          </div>

            <div class="col-md-4 form-group">
                <label for="telefoneUsuario">Telefone</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">+55</div>
                    </div>
                    <input required maxlength="15" minlength="15" type="text" name="telefone" id="telefone" 
                           class="form-control val" onchange="verificaTel();" placeholder="(00) 0 0000-0000">
                </div>
            </div>

          <div class="col-md-4 form-group">
              <label for="cpf">CPF</label>
              <input minlength="14" maxlength="14" type="text" name="cpf" id="cpf"
                     class="form-control val" onchange="verificaCamposPessoais();" placeholder="000.000.000-00" required>
          </div>
        </div>

      <div class="form-row">
        <div class="form-group col-8">
          <label for="senhaAtual">Senha <b>*</b></label>
          <div class="form-row">
              <input onchange="verificaCamposSenha()" minlength="6" maxlength="20" class="form-control col-7" required name="senha" id="senha" type="password">
              <button type="button" style="margin-left:5px" class="btn btn-warning" id="btnRevelaS" name="btnRevelaS" aria-hidden="false"><i class="fas fa-eye-slash" name ="iconS" id="iconS"></i> </button>
          </div>
            <label for="senhaAtual">Confirmação de Senha <b>*</b></label>
            <div class="form-row">
                <input onchange="verificaCamposSenha()" minlength="6" maxlength="20" class="form-control col-7" required name="rptSenha" id="rptSenha" type="password">
                <button type="button" style="margin-left:5px" class="btn btn-warning" id="btnRevelaS" name="btnRevelaS" aria-hidden="false"><i class="fas fa-eye-slash" name ="iconS2" id="iconS2"></i> </button>
            </div>   
            <small id="feedback-senha" class="text-danger"><b>*</b> As senhas devem ser iguais!</small>  
        </div>
      </div>

      <div class="form-row" onmousemove="verificaTipoUsuario();">
        <div class="col-md-4 form-group">
          <label for="tipo_usuario">Tipo de Usuário</label>
            <select name="tipo_usuario" id="tipo_usuario" class="custom-select form-control" required>
              <option disabled selected>Selecione um tipo:</option>
              <option value="10">Administrador</option>
              <option value="9">Funcionário</option>
              <option value="8">Estagiário</option>
            </select>
            <small hidden id="feedback-tipo" class="text-danger">Escolha um tipo de usuário</small>
        </div>
      </div>  

      <div class="form-group">
        <button type="reset" id="btnLimpar" class="btn btn-outline-secondary float-right">Limpar</button>
        <button type="submit" id="btnCadastrar" class="btn btn-primary float-right" style="margin-right:5px">Cadastrar</button>
      </div>
    </form>
  </div>
</div>

@endsection


@section('css')
<style type="text/css">
  form .form-group {
    padding: 2%;
  }

  form span {
    color: black;
    text-decoration: none;
  }
</style>
@endsection

@section('js')
<script src="http://unpkg.com/vanilla-masker@1.1.1/lib/vanilla-masker.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

jQuery(document).ready(function($) {
    $('#iconS').hover(function(e) {     //SENHA
        e.preventDefault();
        if ( $('#senha').attr('type') == 'password' ) {
            $('#senha').attr('type', 'text');
            $('#iconS').attr('class', 'fas fa-eye');
        } else {
            $('#senha').attr('type', 'password');
            $('#iconS').attr('class', 'fas fa-eye-slash');
        }
    });
    $('#iconS2').hover(function(e) {     //SENHA CONFIRMAÇÃO
        e.preventDefault();
        if ( $('#rptSenha').attr('type') == 'password' ) {
            $('#rptSenha').attr('type', 'text');
            $('#iconS2').attr('class', 'fas fa-eye');
        } else {
            $('#rptSenha').attr('type', 'password');
            $('#iconS2').attr('class', 'fas fa-eye-slash');
        }
    });
});

function verificaCamposPessoais(){
    if($('#cpf').val() != ""){
        if( cpfInvalido()== true  ){
            $('#cpf').removeClass('is-valid');
            $('#cpf').addClass('is-invalid');
            $('#btnCadastrar').attr("hidden", '');      //hide button
        }
        else{
            $('#cpf').removeClass('is-invalid');
            $('#cpf').addClass('is-valid');
            $('#btnCadastrar').removeAttr("hidden");    //SHOW button
        }
    }
}

function verificaTel(){
    if($('#telefone').val() != ""){
        if( telInvalido()== true){
            $('#telefone').removeClass('is-valid');
            $('#telefone').addClass('is-invalid');
            $('#btnCadastrar').attr("hidden", '');      //hide button
        }
        else{
            $('#telefone').removeClass('is-invalid');
            $('#telefone').addClass('is-valid');
            $('#btnCadastrar').removeAttr("hidden");        //show button
        }
    }
}

function verificaCamposSenha(){
    if($('#senha').val() != "" || $('#rptSenha').val() != ""){
        if ($('#senha').val() != $('#rptSenha').val()) {
            $('#rptSenha').removeClass('is-valid');
            $('#senha').removeClass('is-valid');
            $('#rptSenha').addClass('is-invalid');
            $('#senha').addClass('is-invalid'); 
            $('#btnCadastrar').attr("hidden", '');      //hide button
        } else {
            $('#senha').removeClass('is-invalid');
            $('#senha').addClass('is-valid');
            $('#rptSenha').removeClass('is-invalid');
            $('#rptSenha').addClass('is-valid');
            $('#btnCadastrar').removeAttr("hidden");    //show button
        }
    }
}

function verificaTipoUsuario(){
    let tipo = $('#tipo_usuario').val();

    if(tipo != 10 || tipo != 9 || tipo != 8){
        $('#btnCadastrar').attr("hidden",'');
        $('#feedback-tipo').removeAttr("hidden");
        $('#btnCadastrar').attr("hidden", '');      //hide button
    }
    if(tipo == 10 || tipo == 9 || tipo ==8) {
        $('#btnCadastrar').removeAttr("hidden");
        $('#feedback-tipo').attr("hidden", '');
        $('#btnCadastrar').removeAttr("hidden");    //show button
    }
}

function cpfInvalido(){
    let cpf = $('#cpf').val();
    return  (cpf.length != 14 || cpf == "000.000.000-00" || cpf == "111.111.111-11" ||  
            cpf == "222.222.222-22" || cpf == "333.333.333-33" || cpf == "444.444.444-44" ||  
            cpf == "555.555.555-55" || cpf == "666.666.666-66" || cpf == "777.777.777-77" || 
            cpf == "888.888.888-88" || cpf == "999.999.999-99");
}

function telInvalido(){
    let tel = $('#telefone').val();
    return  (tel.length != 15 || tel == "(00) 00000-0000" || tel == "(11) 11111-1111" ||  
            tel == "(22) 22222-2222" || tel == "(33) 33333-3333" || tel == "(44) 44444-4444" ||  
            tel == "(55) 55555-5555" || tel == "(66) 66666-6666" || tel == "(77) 77777-7777" || 
            tel == "(88) 88888-8888" || tel == "(99) 99999-9999");
}

$(".val").on("input", function() {
    var regexp = /[^0-9-.]/g;
    if (this.value.match(regexp)) {
        $(this).val(this.value.replace(regexp, ''));
    }
});

$(".nome-text").on("input", function() {
    var regexp = /[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g;
    if (this.value.match(regexp)) {
        $(this).val(this.value.replace(regexp, ''));
    }
});

function inputHandler(masks, max, event) {      //MASCARA PARA O TELEFONE E CPF
    let c = event.target;
    let v = c.value.replace(/\D/g, '');
    let m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

let telMask = ['(99) 99999-9999'];       //MASCARA PARA O TELEFONE 
let tel = document.querySelector('#telefone');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

let cpfMask = ['999.999.999-99'];       //MASCARA PARA O CPF
let cpf = document.querySelector('#cpf');
VMasker(cpf).maskPattern(cpfMask[0]);
cpf.addEventListener('input', inputHandler.bind(undefined, cpfMask, 14), false); 

</script>
@endsection