@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')

{{csrf_field()}}
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- Modal confirmação -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <button type="button" class="btn btn-primary" salvarMudanca>Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal horário estagiários -->
<div class="modal fade" id="modalHorarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Horários Confirmados dos Estagiário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" fecharModal>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-6  float-left">
                    <div class="form-group row">
                        <!-- DIV seleção de estagiário -->
                        <div class="alert alert-danger" role="alert" style='display:none'>Estagiário não possui horário
                            Confirmado!</div>
                        <label class="col-sm-12 col-form-label pt-3" nomeEstagiario>Nome do Estagiário</label>
                        <div class="col-9">
                            <input id="nomeEstagiario" class="form-control" type="text" name="nomeEstagiario"
                                placeholder="Insira o Nome do Estagiário" list="instList" required autofocus>
                            <datalist id="instList">

                            </datalist>
                        </div>
                        <button type="button" class="btn btn-primary float-left " buscarHorarioConfirmado> Buscar
                        </button>

                    </div>

                </div>
                <div class="calendario">
                    <!-- DIV calendario de horário -->
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-primary">

                                <th scope="col">Turno/Dia</th>
                                <th scope="col">Segunda</th>
                                <th scope="col">Terça</th>
                                <th scope="col">Quarta</th>
                                <th scope="col">Quinta</th>
                                <th scope="col">Sexta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="manhã">
                                <th scope="row" class="table-secondary">Manhã</th>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="segunda" segunda></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="terça" terca></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quarta" quarta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quinta" quinta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="sexta" sexta></button></td>
                            </tr>
                            <tr class="tarde">
                                <th scope="row" class="table-secondary">Tarde</th>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="segunda" segunda></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="terça" terca></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quarta" quarta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quinta" quinta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="sexta" sexta></button></td>
                            </tr>
                            <tr class="noite">
                                <th scope="row" class="table-secondary">Noite</th>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="segunda" segunda></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="terça" terca></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quarta" quarta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="quinta" quinta></button></td>
                                <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button"
                                        aria-pressed="false" value="sexta" sexta></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" fecharModalHorario>Fechar</button>
            </div>
        </div>
    </div>
</div>








<div class="matricula">
    <div class="form-row">
        <div class="col-6  float-right">
            <div class="form-group row">
                <!-- DIV seleção de estagiário -->
                <label class="col-sm-12 col-form-label pt-3" nomeEstagiario>Nome do Estagiário</label>
                <div class="col-9">
                    <input id="nomeInst" class="form-control" type="text" name="estagiario"
                        placeholder="Insira o Nome do Estagiário" list="instList" required autofocus>
                    <datalist id="instList">

                    </datalist>
                </div>

                <button type="button" class="btn btn-primary float-left " buscar> Buscar </button>

            </div>

        </div>

        <div class="col-4">
            <!-- DIV de download da Proposta de horário -->
            <div class="input-group-append">
                <label class="pt-3">Comprovante de Matrícula</label>
                <button type="button" class="btn btn-secondary" download>Download</button>
            </div>
        </div>
        <div class="col-2">
            <label class="pt-3">Horários Confirmados</label>
            <button type="button" class="btn btn-warning " id="btnVisualizar" data-detalhe='' data-toggle="modal"
                data-target="#modalHorarios">
                <i class="fas fa-eye"></i> Visualizar
            </button>
        </div>
    </div>

    <div class="row mb-1">
        <!-- DIV de Observações -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Observações do Estagiário </h4>
                        <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="calendario">
        <!-- DIV calendario de horário -->
        <h5>Cronograma Semanal do Semestre</h5>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">

                    <th scope="col">Turno/Dia</th>
                    <th scope="col">Segunda</th>
                    <th scope="col">Terça</th>
                    <th scope="col">Quarta</th>
                    <th scope="col">Quinta</th>
                    <th scope="col">Sexta</th>
                </tr>
            </thead>
            <tbody>
                <tr class="manhã">
                    <th scope="row" class="table-secondary">Manhã</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="segunda" segunda></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="terça" terca></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quarta" quarta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quinta" quinta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="sexta" sexta></button></td>
                </tr>
                <tr class="tarde">
                    <th scope="row" class="table-secondary">Tarde</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="segunda" segunda></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="terça" terca></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quarta" quarta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quinta" quinta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="sexta" sexta></button></td>
                </tr>
                <tr class="noite">
                    <th scope="row" class="table-secondary">Noite</th>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="segunda" segunda></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="terça" terca></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quarta" quarta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="quinta" quinta></button></td>
                    <td><button type="button" class="btn btn-outline btn-lg" data-toggle="button" aria-pressed="false"
                            value="sexta" sexta></button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <!-- Grupo de botões -->
        <button type="submit" class="btn btn-success col-2" value="enviar" data-toggle="modal"
            data-target="#modalExemplo" enviar>
            Enviar
            <i class="fa fa-send"></i>
        </button>
        <button type="submit" value="alterar" name="proposta" class="btn btn-primary col-2" alterar>Alterar</button>
        <!--botao p/ confirmar os dados-->
        <button type="submit" value="cancelar" name="proposta" class="btn btn-danger col-2" cancelar>Cancelar</button>
        <!--botao p/ confirmar os dados-->

    </div>
    @endsection



    @section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
    $(document).ready(function() {
        let horarios = new Map()
        let horario_original = new Map()
        let estagiarios = @json($estagiarios);
        let estID = null;
        carregaNome(estagiarios); //lista o nome dos estágiarios no campo de busca.

        //botões presentes na view 
        let botoesHorarios = $('tbody td').find('button')
        let botaoCancelar = $('button[cancelar]')
        let botoesSubmit = $('button[type=submit]')
        let botaoAlterar = $('button[alterar]')
        let download = $('[download]')


        botoesHorarios.prop("disabled", true)
        botoesSubmit.prop("disabled", true);
        download.prop("disabled", true);


        let inputNome = $("input[name=estagiario]")

        $('[download]').click(e => {
            let link =
                "{{ route('downloadGuia', ['id' => ':id']) }}"; // isso vai compilar o blade com o id sendo uma string ":id" e, no javascript, atribuir ela a uma variável .
            link = link.replace(":id", estID); // isso vai corrigir a string gerada com o id correto.
            var a = document.createElement('a');
            a.href = link;
            a.download = 'myfile.pdf';
            document.body.append(a);
            a.click();
        })

        $('#btnVisualizar').click(e => {
            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            $('.alert').hide()
        })
        $('[fecharModalHorario]').click(e => {
            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            botoesHorarios.prop("disabled", true)
            botoesSubmit.prop("disabled", true);
            download.prop("disabled", true);
        })
        $('[buscarHorarioConfirmado]').click(e => {
            e.preventDefault()
            $('.alert').hide()
            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            let nomeEstagiario = $("input[name=nomeEstagiario]")
            let ID = getID(estagiarios, nomeEstagiario.val()) //retorna id de estagiario selecionado
            if (ID) {
                let url =
                    "{{ route('retornaHorarioConfirmado', ['id' => ':id']) }}"; // isso vai compilar o blade com o id sendo uma string ":id" e, no javascript, atribuir ela a uma variável .
                url = url.replace(":id", ID); // isso vai corrigir a string gerada com o id correto.

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                /**
                    Requisição ajax para retornar horarios de estagiários, 
                    como resultado pinta os horários na tela. 
                */
                $.get(url, function(e) {
                    for (let estagiario of e["horario"]) {
                        let dias = estagiario.dia_semana
                        let turnos = estagiario.turno
                        let obj = {
                            turno: turnos,
                            dia: dias
                        }
                        pinta(dias, turnos)
                    }
                }).fail(function() {
                    $('.alert').show()
                })
            }
        })

        $('[fecharModal]').click(e => {
            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            botoesHorarios.prop("disabled", true)
            botoesSubmit.prop("disabled", true);
            download.prop("disabled", true);
        })


        jQuery('[buscar]').click(e => {
            e.preventDefault() //evita ação de botão

            horarios = new Map()
            horario_original = new Map()

            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            botoesSubmit.prop("disabled", false);
            botaoCancelar.prop("disabled", true);
            download.prop("disabled", false);
            estID = getID(estagiarios, inputNome.val()) //retorna id de estagiario selecionado

            if (estID) {
                let url =
                    "{{ route('retornaProposta', ['id' => ':id']) }}"; // isso vai compilar o blade com o id sendo uma string ":id" e, no javascript, atribuir ela a uma variável .
                url = url.replace(":id", estID); // isso vai corrigir a string gerada com o id correto.

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                /**
                    Requisição ajax para retornar horarios de estagiários, 
                    como resultado pinta os horários na tela. 
                */
                $.get(url, function(estagiarios) {
                    for (let estagiario of estagiarios["horario"]) {
                        let dias = estagiario.dia_semana
                        let turnos = estagiario.turno
                        let obj = {
                            turno: turnos,
                            dia: dias
                        }
                        horarios.set(`${obj.turno}+${obj.dia}`, obj)
                        horario_original.set(`${obj.turno}+${obj.dia}`, obj)
                        pinta(dias, turnos)
                    }
                    //adiciona observações feitas a estágiario.
                    for (let estagiarioObservacao of estagiarios["observacao"]) {
                        $('.card-text').html(estagiarioObservacao.observacao);
                    }

                })
            } else {
                download.prop("disabled", true);
                botoesHorarios.prop("disabled", true);
                botoesSubmit.prop("disabled", true);
            }
        })


        jQuery('[alterar]').click(e => {
            e.preventDefault() //evita ação de botão
            botoesHorarios.prop("disabled", false);
            botaoAlterar.prop("disabled", true);
            botaoCancelar.prop("disabled", false);
        })

        /**
            Adiciona os horários selecionados a uma estrutura map.
        */
        $('tbody td').find('button').click(e => {
            e.preventDefault() //evita ação de botão
            let buttonTrash = $(e.target)
            buttonTrash.toggleClass('btn btn-success')
            let dias = buttonTrash[0].value
            console.log(dias)
            let quantTrash = buttonTrash.parent().parent()
            let turnos = quantTrash[0].className
            let obj = new Object({
                turno: turnos,
                dia: dias
            })

            if (buttonTrash.hasClass("btn-success")) {
                horarios.set(`${obj.turno}+${obj.dia}`, obj)
            } else {
                horarios.delete(`${obj.turno}+${obj.dia}`)
            }
        })

        /**
            Ao clicar em cancelar carrega na tela a proposta de horário original.
        */
        jQuery('[cancelar]').click(e => {
            e.preventDefault() //evita ação de botão
            botoesHorarios.removeClass('btn btn-success').addClass('btn btn-outline')
            horarios = new Map(horario_original);
            horarios.forEach((vl, cha) => {
                pinta(vl.dia, vl.turno)
            })
            botoesHorarios.prop("disabled", true);
            botaoAlterar.prop("disabled", false);
            botaoCancelar.prop("disabled", true);
        })

        /**
            Envia para o servidor o horários do estagiário. 
         */
        jQuery('[salvarMudanca]').click(e => {
            e.preventDefault()
            console.log(strMapToObj(horarios))
            $.ajax({
                url: "{{route('enviaHorario')}}",
                method: 'post',
                data: {
                    ID: getID(estagiarios, inputNome.val()),
                    horario_definitivo: strMapToObj(horarios)
                },
                success(retorno) {
                    location.reload();
                },
                error(erro) {
                    console.log(erro)
                }

            })
        })
    })

    /**
        Carrega os nomes dos estagiários no campo de busca.
     */
    const carregaNome = (e) => {
        for (let i = 0; i < e.length; i++) {
            $('#instList').append(`<option class="opList" value="${e[i].nome}">`)
        }
    }

    /**
        Retorna Id de estagiário.
     */
    function getID(estagiarios, nome) {
        const filterID = estagiario => estagiario.nome == nome
        let result = estagiarios.filter(filterID)
        if (result.length != 0) {
            return result[0].ID
        }
        return false;

    }
    /**
        Converte uma estrutura map em um objeto.
     */
    function strMapToObj(strMap) {
        let obj = Object.create(null);
        let i = 0;
        for (let [k, v] of strMap) {
            obj[k] = v
        }
        return obj;
    }

    /**
        Pinta os horários dos estágiarios na tabela de horários.
     */
    function pinta(dias, turnos) {
        switch (dias) {
            case 'segunda':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[segunda]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[segunda]').toggleClass('btn btn-success')
                } else if(turnos == 'noite'){
                    $('.noite td').find('button[segunda]').toggleClass('btn btn-success')
                }
                break
            case 'terça':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[terca]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[terca]').toggleClass('btn btn-success')
                } else if(turnos == 'noite'){
                    $('.noite td').find('button[terca]').toggleClass('btn btn-success')
                }
                break
            case 'quarta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[quarta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[quarta]').toggleClass('btn btn-success')
                } else if(turnos == 'noite'){
                    $('.noite td').find('button[quarta]').toggleClass('btn btn-success')
                }
                break
            case 'quinta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[quinta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[quinta]').toggleClass('btn btn-success')
                } else if(turnos == 'noite'){
                    $('.noite td').find('button[quinta]').toggleClass('btn btn-success')
                }
                break
            case 'sexta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[sexta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[sexta]').toggleClass('btn btn-success')
                } else if(turnos == 'noite'){
                    $('.noite td').find('button[sexta]').toggleClass('btn btn-success')
                }
                break
            default:
                console.log('dia incorreto')
        }
    }
    </script>
    @endsection

    <style>
    table td button.btn-outline {
        border: 1px solid rgb(93, 98, 105);
    }

    button[type=submit],
    button[type=button] {
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }

    h4 {
        padding: 0px 30px 10px 30px;
    }

    .calendario {
        padding: 20px 2px 0px 0px;
    }

    .download {
        padding-left: 60px;
    }

    /*configurando design do botão alterar*/
    .submit_buttons {
        background-color: #007bff;
        position: absolute;
        left: 680px;
        color: white;
        border: 5px;
        border-radius: 5px;
        padding: 5px;
    }

    /*configurando design do botão salvar*/
    .submit_button {
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
        border: 3px black;
        background: transparent url(/../img/logo-download.png) no-repeat;
        background-position: left 15% bottom 50%;
        background-size: 18px;
        overflow: hidden;
        cursor: pointer;
        /* vai por o cursor como forma de mão ao passar por cima do botão */
        cursor: hand;
        /* para o IE 5.x */
    }

    [buscar] {
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /*Posição do botão do download */
    .input-group-append {
        padding: 0px 100px 0px 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    table {
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