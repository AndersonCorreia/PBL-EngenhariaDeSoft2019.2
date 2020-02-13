@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')
{{csrf_field()}}
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Horário Estagiário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja confirmar as alterações?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>


<div class="matricula">
    <div class="form-row">
        <div class="col-6  float-right">
            <div class="form-group row">
                <label class="col-sm-12 col-form-label" nomeEstagiario >Nome do Estagiário</label>
                <div class="col-9">
                    <input id="nomeInst" class="form-control" type="text" name="estagiario" placeholder="Insira o Nome do Estagiário" list="instList" required autofocus>
                    <datalist id="instList">
                       
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
            <tbody >
                <tr class="segunda">
                    <th scope="row" class="table-secondary">Segunda</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="manha" manha>08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="tarde" tarde>14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="noite" noite>18:00 - 22:00</button></td>
                </tr>
                <tr class="terca">
                    <th scope="row" class="table-secondary">Terça</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="manha" manha>08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="tarde" tarde>14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="noite" noite>18:00 - 22:00</button></td>
                </tr>
                <tr class="quarta">
                    <th scope="row" class="table-secondary">Quarta</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="manha" manha>08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="tarde" tarde>14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="noite" noite>18:00 - 22:00</button></td>
                </tr>
                <tr class="quinta">
                    <th scope="row" class="table-secondary">Quinta</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="manha" manha>08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="tarde" tarde>14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="noite" noite>18:00 - 22:00</button></td>
                </tr>
                <tr class="sexta">
                    <th scope="row" class="table-secondary">Sexta</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="manha" manha>08:00 - 12:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="tarde" tarde>14:00 - 18:00</button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false" value="noite" noite>18:00 - 22:00</button></td>
                </tr>
            </tbody>
        </table>
</div>

    <div class="form-group">
        <button type="submit" class="btn btn-success col-2" value="enviar" data-toggle="modal" data-target="#modalExemplo"  enviar>
           Enviar
            <i class="fa fa-send"></i>
        </button>
        <button type="submit" value="alterar" name="proposta" class="btn btn-primary col-2" alterar>Alterar</button>  <!--botao p/ confirmar os dados-->
        <button type="submit" value="cancelar" name="proposta" class="btn btn-danger col-2" cancelar>Cancelar</button> <!--botao p/ confirmar os dados-->
        
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
    $(document).ready(function() {
        let horarios = new Map()
        const horario_original= new Map()
        let carregaNome = (e)=>{
            for(let i=0; i<e.length; i++){
                $('#instList').append(`<option class="opList" value="${e[i].nome}">`)
            }
        }
        let est = @json($estagiarios);

        carregaNome(est);

        $('tbody td').find('button').prop("disabled", true);
        $('button[type=submit]').prop("disabled", true);


        let inputNme = $("input[name=estagiario]")
        jQuery('[buscar]').click(e => {
                e.preventDefault() //evita ação de botão
                $('tbody td').find('button').removeClass('btn btn-success').addClass('btn btn-outline')
                $('button[type=submit]').prop("disabled", false);
                $('button[cancelar]').prop("disabled", true);                
                if(inputNme.val()!=''){ 
                    const filterID = estagiario => estagiario.nome == inputNme.val()
                    let result = est.filter(filterID)
                    let estID=result[0].ID
                    var url = "{{ route('retornaProposta', ['id' => ':id']) }}"; // isso vai compilar o blade com o id sendo uma string ":id" e, no javascript, atribuir ela a uma variável .
                    url = url.replace(":id", estID); // isso vai corrigir a string gerada com o id correto.

                    $.ajaxSetup({
                        headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                    });
                    $.get(url,function(estagiarios){
                        for(let estagiario of estagiarios){
                            let dias = estagiario.dia_semana
                            let turnos = estagiario.turno
                            let obj={turno: turnos, dia: dias}
                            horarios.set(`${obj.turno}+${obj.dia}`,obj)
                            horario_original.set(`${obj.turno}+${obj.dia}`,obj)
                            pinta(dias,turnos)
                        }
                    })           
                } else{
                    $('tbody td').find('button').prop("disabled", true);
                    $('button[type=submit]').prop("disabled", true);
                }          
            })  

        jQuery('[alterar]').click(e => {
            e.preventDefault() //evita ação de botão
            $('tbody td').find('button').prop("disabled", false); 
            $('button[alterar]').prop("disabled", true); 
            $('button[cancelar]').prop("disabled", false); 
        })

        $('tbody td').find('button').click(e=>{
            e.preventDefault() //evita ação de botão
            let buttonTrash = $(e.target)
            buttonTrash.toggleClass('btn btn-success')
            let turnos = buttonTrash[0].value
            let quantTrash = buttonTrash.parent().parent()
            let dias = quantTrash[0].className
            let obj = new Object({turno: turnos, dia: dias})
            if(buttonTrash.hasClass("btn-success")){
                horarios.set(`${obj.turno}+${obj.dia}`,obj)
            }else{               
                horarios.delete(`${obj.turno}+${obj.dia}`)                   
            }  
        })

        jQuery('[cancelar]').click(e=>{
            e.preventDefault() //evita ação de botão
            $('tbody td').find('button').removeClass('btn btn-success').addClass('btn btn-outline')
            horarios = new Map(horario_original); 
            horarios.forEach((vl, cha) => {
                pinta(vl.dia,vl.turno)
            })  
            $('tbody td').find('button').prop("disabled", true);
            $('button[alterar]').prop("disabled", false);
            $('button[cancelar]').prop("disabled", true);  
        })

        jQuery('[enviar]').click(e=>{

            //location.reload();
        })
    })

    function pinta(dias,turnos){
        switch (dias){
                case 'segunda':
                    if(turnos == 'manha'){
                        $('.segunda td').find('button[manha]').toggleClass('btn btn-success')                                  
                    }else if(turnos == 'tarde'){
                        $('.segunda td').find('button[tarde]').toggleClass('btn btn-success')
                    }
                    break
                case 'terca':
                    if(turnos == 'manha'){
                        $('.terca td').find('button[manha]').toggleClass('btn btn-success')
                    }else if(turnos == 'tarde'){
                        $('.terca td').find('button[tarde]').toggleClass('btn btn-success')
                    }   
                    break
                case 'quarta':
                    if(turnos == 'manha'){
                        $('.quarta td').find('button[manha]').toggleClass('btn btn-success')
                    }else if(turnos == 'tarde'){
                        $('.quarta td').find('button[tarde]').toggleClass('btn btn-success')
                    }
                    break 
                case 'quinta':
                    if(turnos == 'manha'){
                        $('.quinta td').find('button[manha]').toggleClass('btn btn-success')
                    }else if(turnos == 'tarde'){
                        $('.quinta td').find('button[tarde]').toggleClass('btn btn-success')
                    }
                    break
                case 'sexta':
                    if(turnos == 'manha'){
                        $('.sexta td').find('button[manha]').toggleClass('btn btn-success')
                    }else if(turnos == 'tarde'){
                        $('.sexta td').find('button[tarde]').toggleClass('btn btn-success')
                    }   
                    break    
                default:
                    console.log('dia incorreto')
        }
    }
    </script>
    @endsection

<style>

    table td button.btn-outline{
        border: 1px solid rgb(93, 98, 105);  
    }   

    button[type=submit]{
        border-bottom-right-radius: 20px; 
        border-bottom-left-radius: 20px;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }

    h4{
        padding: 0px 30px 10px 30px;
    }
    .calendario{
        padding:20px 30px 0px 0px ;
    }

    .download {
        padding-left: 60px;
    }

    /*configurando design do botão alterar*/
    .submit_buttons{
        background-color: #007bff;
        position: absolute;
        left: 680px;
        color: white;
        border: 5px;
        border-radius: 5px;
        padding: 5px; 
    }
    
    /*configurando design do botão salvar*/
    .submit_button{
        background-color: #dd2c00;  
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