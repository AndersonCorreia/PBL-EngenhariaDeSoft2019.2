@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Dashboard Estagiário')

@section('conteudo')
    <div class="row p-4">
        <div class="col-md-6">
            <div class= "mt-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleClima>
                <h5 class="text-center">PREVISÃO DO TEMPO</h5>
            </div>
            <div class= "mt-3 p-1 scorpius-border-shadow border-top border-shadow bg-dark" clima> 
                <div id="cont_95c97e35b519de972fd2e46a44e7c47f" class="rounded">
                    <script type="text/javascript" async src="https://www.tempo.com/wid_loader/95c97e35b519de972fd2e46a44e7c47f">
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class= "mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark text-white" titleProxVisita>
                <h5 class="text-center">SEU HORÁRIO</h5>
            </div>
            <div>
                @if(empty($horarios))
                    <div class= "text-center mt-3 mx-3 p-3 px-3 scorpius-border-shadow border-top border-shadow bg-dark" escolas>

                    <div class="alert alert-secondary mt-3 text-center" role="alert">
                        <strong>Você ainda não possui um horário definido.</strong>
                    </div>
                </div>
                @else
                <div class= "mt-3 mx-3 p-3 scorpius-border-shadow border-top border-shadow bg-dark" escolas>

                <div class="list-group">
                <li class="list-group-item btn-block bg-secondary border-all-100 text-uppercase">
                    <div class="row text-center text-white">
                        <div class="col-md-6">DIA</div>
                        <div class="col-md-6">TURNO</div>
                    </div>
                </li>
                @foreach ($horarios as $horario)
                <li class="list-group-item btn-block text-uppercase border-all-100">
                    <div class="row text-center">
                        <div class="col-md-6">
                            {{$horario['dia_semana']}}
                        </div>
                        <div class="col-md-6">
                            {{$horario['turno']}}
                        </div>
                    </div>
                </li>
                @endforeach
                </div>
            </div>    

                @endif
            </div>
        </div>
    </div>

<style>

    [escolas]{
        width: 475px; 
        min-height: 355px;
    }
</style>

@endsection