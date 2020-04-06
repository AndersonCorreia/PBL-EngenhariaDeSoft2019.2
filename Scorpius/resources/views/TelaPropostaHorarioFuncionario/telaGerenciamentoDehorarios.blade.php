@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Confirmar Horários dos Estagiários')

@section('conteudo')

{{csrf_field()}}
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<!-- Modal confirmação de periodo de matrícula-->
<div class="modal fade" id="modalMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMatriculaLabel">Periodo de matrícula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja cotinuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" abrirMat>Confirmar</button>
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
                <!--calendario-->
                @include('TelaPropostaHorarioFuncionario._include.calendario')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" fecharModalHorario>Fechar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal periodo de visita -->
<div class="modal fade" id="modalPeridoVisita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Período de visitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" fecharModal>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPeriodo">
                    <div class="form-group col-md-12" align="center">
                        <label class="badge-pill badge-primary" for="semestre"></label>
                    </div>
                    <div class="form-group row col-12 p-3">
                        <div class="col-md-2">
                            <label for="periodo">Período de visitas:</label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group" style="padding-left: 20px;">
                                <label for="periodo_inicio_campo" class="col-form-label">Data
                                    Início:</label>
                                <input type="date" class="form-control" name="data_inicial" id="periodo_inicio_campo" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="periodo_termino_campo" class="col-form-label">Data
                                    Término:</label>
                                <input type="date" class="form-control" name="data_final" id="periodo_termino_campo" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" confirmaVisita>Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Corpo Principal -->
<div class="container">

    <div class="periodo scorpius-border-shadow border-top border-shadow">
        <div class="form-group col-md-12" align="center">
            <label class="badge-pill badge-primary" for="semestre"></label>
        </div>
        <div class="form-group col-md-12" align="center">
            <button type="button" class="btn btn-info" periodo>
                <i class="fa fa-unlock" aria-hidden="true"></i>
                Abrir período de matrícula
            </button>
        </div>
    </div>
    <div class="matricula collapse  mt-3 mx-0 p-1 scorpius-border-shadow border-top border-shadow">
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
                            <div style='display:none' class="alert alert-secondary" role="alert">
                                Estagiário não fez nenhuma observação quanto sua proposta de horário.
                            </div>
                            <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <!--calendario-->
        @include('TelaPropostaHorarioFuncionario._include.calendario')

        <div class="form-group">
            <!-- Grupo de botões -->
            <button type="submit" class="btn btn-success col-2" value="enviar" data-toggle="modal"
                data-target="#modalExemplo" enviar>
                Enviar
                <i class="fa fa-send"></i>
            </button>
            <button type="submit" value="alterar" name="proposta" class="btn btn-primary col-2" alterar>Alterar</button>
            <!--botao p/ confirmar os dados-->
            <button type="submit" value="cancelar" name="proposta" class="btn btn-danger col-2"
                cancelar>Cancelar</button>
            <!--botao p/ confirmar os dados-->

        </div>
    </div>
    @endsection



    @section('js')

    <script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
        let inputNome = $("input[name=estagiario]")

        botoesHorarios.prop("disabled", true)
        botoesSubmit.prop("disabled", true)
        download.prop("disabled", true)

        //semestre corrente
        var data = new Date();
        if (data.getMonth() < 6) {
            $('label[for=semestre]').html("Período: 1º Semestre")
        } else {
            $('label[for=semestre]').html("Período: 2º Semestre")
        }

        $('[confirmaVisita]').click(e => {
            e.preventDefault()
            validar()
            let periodoInicial = $('#periodo_inicio_campo')
            let periodoFinal = $('#periodo_termino_campo')
            if (periodoInicial.hasClass("is-invalid") || periodoFinal.hasClass("is-invalid")) {
                alert("data inválida")
            } else {
                let botaoPeriodo = $('[periodo]')
                let dataInicio = new String($('#periodo_inicio_campo').val())
                let dataFim = new String($('#periodo_termino_campo').val())
                $.post("{{route('definirPeriodoVisita')}}", {
                    dataInicial: dataInicio,
                    dataFinal: dataFim
                })
                $(botaoPeriodo).toggleClass('btn-dark')
                $(botaoPeriodo).text("   Abrir período de matrícula")
                $(botaoPeriodo).removeClass('fa fa-unlock-alt')
                $(botaoPeriodo).addClass('fa fa-unlock')
                $.ajax({
                    url: "{{route('alterarStatusPeriodo')}}",
                    method: 'post',
                    data: {
                        modo: 1
                    }
                })
                $('#modalPeridoVisita').modal('hide')
                $('.matricula').toggle()
            }
        })

        $('[periodo]').click(e => {
            e.preventDefault()
            console.log($(e.currentTarget))
            if (!$(e.target).hasClass('btn-dark')) {
                jQuery('#modalMatricula').modal('show')
            } else {
                $('#modalPeridoVisita').modal('show')
            }

        })

        //consultar permissão 
        $.get("{{route('consultaPermissao')}}", data => {
            if (data) {
                let botaoPeriodo = $('[periodo]')
                $('.matricula').toggle()
                $(botaoPeriodo).toggleClass('btn-dark')
                $(botaoPeriodo).text("   Fechar período de matrícula")
                $(botaoPeriodo).addClass('fa fa-unlock-alt')
            }
        })

        //altera a permissao do estagiario para realizar demanda
        $('[abrirMat]').click(e => {

            let botaoPeriodo = $('[periodo]')
            jQuery('#modalMatricula').modal('hide')
            $('.matricula').toggle()
            $(botaoPeriodo).toggleClass('btn-dark')
            $(botaoPeriodo).text("   Fechar período de matrícula")
            $(botaoPeriodo).addClass('fa fa-unlock-alt')
            $.ajax({
                url: "{{route('alterarStatusPeriodo')}}",
                method: 'post',
                data: {
                    modo: 0
                }
            })

        })


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
            $('.alert-secondary').hide()
            $('.card-text').html('');
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
            $('.alert-secondary').hide()
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
                    if (estagiarios["observacao"][0].observacao) {
                        $('.card-text').html(estagiarios["observacao"][0].observacao);
                    } else {
                        $('.card-text').html('');
                        $('.alert-secondary').show()
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


    function validar() {

        /**
            Método que valída a se a data inserida é maior que a data atual.
        */
        $.validator.addMethod("minDate", function(value, element) {
            var curDate = new Date();
            var inputDate = new Date(value);
            if (inputDate > curDate || value == '')
                return true;
            return false;
        });
        /**
            Método que valída se a data de inicio da exposição é maior que a final. 
        */
        $.validator.addMethod("menorDataFinal", function(value, element, param) {
            let dataFim = $('#periodo_termino_campo').val()
            if (dataFim != "") {
                let endDate = new Date(dataFim);
                let inputDate = new Date(value);
                if (inputDate > endDate)
                    return false;
            }
            return true;

        });

        /**
            Método que verifica se data final inserida é maior que data inicial.
         */
        $.validator.addMethod("maiorDataInicial", function(value, element) {
            let dataInicio = $('#periodo_inicio_campo').val()
            if (dataInicio != "") {
                let endDate = new Date(dataInicio);
                let inputDate = new Date(value);
                if (inputDate < endDate)
                    return false;
            }
            return true;
        });


        /**
            Validação de formulário.
        */
        $('#formPeriodo').validate({
            submitHandler: function(form) {
                form.submit()
            },
            onfocusin: function(e) {
                this.element(e);
            },
            onfocusout: function(e) {
                this.element(e);
            },
            onclick: function(element) {
                this.element(element);
            },
            onkeyup: function(element) {
                this.element(element);
            },
            onfocus: function(element) {
                this.element(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
                $(element.form).find("input[for=" + element.id + "]").addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
                $(element.form).find("input[for=" + element.id + "]").removeClass('is-invalid');
            },
            showErrors: function(errorMap, errorList) {
                this.defaultShowErrors();
            },
            rules: {
                data_inicial: {
                    required: true,
                    menorDataFinal: ''
                },
                data_final: {
                    required: true,
                    minDate: '',
                    maiorDataInicial: ''
                }
            },
            messages: {
                data_inicial: {
                    required: "Insira uma data inicial",
                    menorDataFinal: "Data inicial deve ser menor que a final"
                },
                data_final: {
                    required: "Insira uma data final",
                    minDate: "Insira uma data superior a atual",
                    maiorDataInicial: "Data final deve ser maior que inicial"
                }
            }
        })

        $('label[for=periodo_inicio_campo]').trigger('click');
        $('label[for=periodo_termino_campo]').trigger('click');
    }

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
                } else if (turnos == 'noite') {
                    $('.noite td').find('button[segunda]').toggleClass('btn btn-success')
                }
                break
            case 'terça':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[terca]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[terca]').toggleClass('btn btn-success')
                } else if (turnos == 'noite') {
                    $('.noite td').find('button[terca]').toggleClass('btn btn-success')
                }
                break
            case 'quarta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[quarta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[quarta]').toggleClass('btn btn-success')
                } else if (turnos == 'noite') {
                    $('.noite td').find('button[quarta]').toggleClass('btn btn-success')
                }
                break
            case 'quinta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[quinta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[quinta]').toggleClass('btn btn-success')
                } else if (turnos == 'noite') {
                    $('.noite td').find('button[quinta]').toggleClass('btn btn-success')
                }
                break
            case 'sexta':
                if (turnos == 'manhã') {
                    $('.manhã td').find('button[sexta]').toggleClass('btn btn-success')
                } else if (turnos == 'tarde') {
                    $('.tarde td').find('button[sexta]').toggleClass('btn btn-success')
                } else if (turnos == 'noite') {
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
    .periodo {
        padding: 2% 0% 2% 0%;
    }

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
        min-width: 100%;
        height: 50%;
    }

    td:first-child {
        border-left-width: 1px;
    }
    </style>