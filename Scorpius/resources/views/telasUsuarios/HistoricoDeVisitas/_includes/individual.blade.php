<div class= "row col-12 m-1 p-2 scorpius-border-shadow border-top border-shadow">
    <div class="row col-12 m-0 pl-2 p-0">
        <div class="col-6 m-0 p-0">
            <b>Data:</b> {{$agend['data']}}
        </div>
        <div class="col-6 m-0 p-0">
            <b>Turno:</b> {{$agend['turno']}}
        </div>
        <div class="col-12 m-0 p-0">
            <b>Status do Agendamento:</b> {{$agend['agendamentoStatus']}}
        </div>
        <div class="col-8 m-0 p-0">
            <b>Total de Visitantes:</b> {{$agend['totalVisitantes']}}
        </div>
        <div class="col-4 m-0 p-0">
            <button type="button" class="btn btn-primary float-left btn-sm " data-toggle="modal"
                data-target="#modal-dados-completos-individual{{$loop->index}}" expand>Dados Completos
            </button>
        </div>
    </div>
</div>
<!--modal dos dados completos-->
<div class="modal fade " id="modal-dados-completos-individual{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Dados Completos do agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class= "row p-3 col-12 m-auto scorpius-border-shadow border-top border-shadow" bordaModal>
                    <div class="row col-12 m-0 p-0">
                        <div class="col-6 m-0 p-0">
                            <b>Data:</b> {{$agend['data']}}
                        </div>
                        <div class="col-6 m-0 p-0">
                            <b>Turno:</b> {{$agend['turno']}}
                        </div>
                        <div class="col-12 m-0 p-0">
                            <b>Status do Agendamento:</b> {{$agend['agendamentoStatus']}}
                        </div>
                        <div class="col-8 m-0 p-0">
                            <b>Total de Visitantes:</b> {{$agend['totalVisitantes']}}
                        </div>
                    </div>
                    <div class="row col-12 m-0 my-1 p-0">
                        <span class="col-12 m-0 my-1 p-0 font-weight-bold">Exposiçoes Escolhidas</span>
                        <hr class="bg-light col-12 linha rounded p-0 m-0">
                        @foreach ($agend['exposicoes'] as $item) 
                            <div class="col-12 col-lg-6 m-0 my-1 p-0 pl-md-4 px-2 border">
                                {{$item['titulo']}}: {{$item['descricao']}}
                            </div>
                        @endforeach
                        <hr class="bg-light col-12 linha rounded p-0 m-0">
                    </div>
                    <div class="row col-12 m-0 my-1 p-0">
                        <span class="col-12 m-0 p-0 font-weight-bold">Lista dos Alunos</span>
                        <hr class="bg-light col-12 linha rounded p-0 m-0">
                        <div class="col-5 col-md-6 m-0 my-1 p-0 pl-md-4 pl-3 border-right border-bottom">
                            <small><b>NOME:</small></b>
                        </div>
                        <div class="col-5 col-md-4 m-0 my-1 p-0 pl-md-4 pl-3 border-right border-bottom">
                            <small><b>RG:</small></b>
                        </div>
                        <div class="col-2 m-0 my-1 p-0 pl-md-4 pl-md-3 pl-1 border-right border-bottom">
                            <small><b>IDADE:</small></b>
                        </div>
                        @foreach ($agend['visitantes'] as $item)
                        <div class="col-5 col-md-6 m-0 my-1 p-0 pl-md-4 overflow border-right border-bottom">
                            {{$item['nome']}}
                        </div>
                        <div class="col-5 col-md-4 m-0 my-1 p-0 pl-md-4 border-right border-bottom">
                            {{$item['rg']}}
                        </div>
                        <div class="col-2 m-0 my-1 p-0 pl-md-4 pl-md-3 border-right border-bottom">
                            {{$item['idade']}}
                        </div>
                        @endforeach
                        <hr class="bg-light col-12 linha rounded p-0 m-0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>