
<div class="col-xl-4">
    <div class= "row mt-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-black" titleEstagiarios>
        <h5 class="col-sm-12" nomeEscola>Estagiários Ativos</h5>
    </div>
    <div class= "row mt-3 mx-3 p-3 px-3 scorpius-border-shadow border-top border-shadow bg-white" style="overflow-y: auto;"  listaEst>
                
                @foreach($visitantes as $visita)
                    @if(isset($visita['visitantes'][0]['aluno']))
                    <div class= "row mt-1 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-white text-white"  conteudolistaEst>
                        <p class="h6 col-sm-12" nomeEscola>{{$visita['visitantes'][0]['instituicao']['nome']}}</p> <!--Substituir por acesso ao banco - nome da instituição -->
                        <p class="h6 col-sm-12" dataVisita>Data: {{$visita['dia']['data']}}</p> 
                        <p class="h6 col-sm-12" turnoVisita>Turno: {{strtoupper($visita['dia']['turno'])}}</p>
                    </div>
                    @endif
                @endforeach

    </div>
</div>



<style>
[titleEstagiarios]{
        width: 300px;
        height: 70px;
}

[listaEst]{
        width: 300px;
        height: 370px;
}

[conteudolistaEst]{
        width: 250px;
        height: 130px; 
}

</style>