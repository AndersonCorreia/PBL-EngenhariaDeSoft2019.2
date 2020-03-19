<div class="col-12 m-0 p-0 ">
    <div class="col-12 p-2 m-0 vh-75 text-center overflow-auto">
        <img src="data:image/jpeg;base64,{{$atividade['imagem']}}"  class="h-100 w-auto">
    </div>    
    <div class="col-12 p-0 px-3 py-1 m-0">    
        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                data-target="#modal-atividade-diferenciada{{$atividade['ID']}}">
                <b>{{$atividade['titulo']}}</b>
        </button>
    </div>
</div>
<!--Modal Agendamento-->
<div class="modal fade" id ="modal-atividade-diferenciada{{$atividade['ID']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" >{{$atividade['titulo']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Formulario de Agendamento-->
            <form id="form.agendamento" class="container-fluid m-0 p-3" method="POST" action="{{route('AgendarDiurnoVisitante.post')}}">
                {{csrf_field()}}
                <input type="hidden" name="atividadeID" value={{$atividade['ID']}} >

                <div id="dados-agendamento" class="row col-12 m-0 p-0">
                    <p class="h5 col-12 m-0 p-0">Dados para o agendamento</p>
                    <div class="col-md-6 m-0 p-0 pr-2">
                        <label for="data">Data desejada</label>
                        <input class="form-control" id="data" name="data" type="date" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            max={{$atividade['data_final']}} min={{$atividade['data_inicial']}} required>
                    </div>
                    <div class="col-md-6 m-0 p-0">
                        <label for="turno">Turno</label>
                        <select id="turno" name="turno" id="turno" class="custom-select" placeholder="turno" required>
                            @if ($atividade['turno']!='noturno')
                                <option value="manhã">Manhã</option>
                                <option value="tarde">Tarde</option>
                            @else
                                <option value="noite">Noite</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="mt-4 row col-12 m-0 p-0">
                    <p class="h6 col-12 m-0 p-0 ">Dados do visitante</p>
                    <div class="col-10 m-0 p-0">Nome</div>
                    <div class="col-2 m-0 p-0">Idade</div>
                    <div class="col-md-10 m-0 p-0 pr-2">
                        <input id="visitante" class="form-control" type="text" maxlength="40" name="visitante"
                            placeholder="Nome completo do visitante" pattern="[a-zA-ZÀ-Úà-ú ]+$$" required>
                    </div>
                    <div class="col-md-2 m-0 p-0">
                        <input id="idade" class="form-control" type="text" maxlength="3" name="idade"
                            placeholder="xx" pattern="[0-9]+$$" required>
                    </div>
                </div>
                <div id="observacoes" class="mt-3">
                    <textarea class="form-control" name="observacao" rows="3" placeholder="Observações"></textarea>
                </div>
                <div class=" mt-2 float-right">
                    <button id="submit" type="submit" class="btn mr-2 btn-primary">
                        <i class="fas fa-receipt    "></i>
                        Agendar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>