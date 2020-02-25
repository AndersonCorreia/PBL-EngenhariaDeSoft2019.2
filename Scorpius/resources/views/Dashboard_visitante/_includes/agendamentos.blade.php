
<form method="GET"  action="#" enctype="multipart/form-data">
    {{csrf_field()}}

    @foreach($registros as $registro)
    <div class= "instBotoes">
        <div class="instituicoes card" >
        <table class="table-borderless">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data>{{trim(substr($registro['Data_Agendamento'], 0, 11))}}</td>
                    <td hora>{{trim(substr($registro['Data_Agendamento'], 11, 14))}}</td>
                    <td status>{{trim($registro['Status'])}}</td>
                </tr>
            </tbody>
        </table>
        </div>

        <div class="botoes">
                <a  href="{{route('confirma',[$registro['ID'],'confirmado'])}}" class="btn col btn-primary status p-1" value="{{$registro['Status']}}" confirmar>Confimar</a>
                <a  href="{{route('confirma', [$registro['ID'],'cancelado pelo usuario'])}}" class="btn col btn-danger status p-1" value="{{$registro['Status']}}" cancelar>Cancelar</a>
        </div>
        </div>
        @endforeach
    
</form>
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function() {
    let statusConfirmado = $('[confirmar]')
    let statusCancelado = $('[cancelar]')
    for(let i=0; i<statusConfirmado.length; i++){
        let value1 = statusConfirmado[i].getAttribute("value");
        let value2 = statusCancelado[i].getAttribute("value");
        if(!value1.search("cancelado") || !value1.search("confirmado")){
            statusConfirmado[i].setAttribute("style", "cursor: default; pointer-events: none;user-select:none; opacity: 0.3;");
        }
        if(!value2.search("cancelado")){
            statusCancelado[i].setAttribute("style", "cursor: default; pointer-events: none;user-select:none; opacity: 0.3;");
        }
    }
})

</script>
@endsection
<style>
    .instituicoes{
        height:75px;
        width:500px;     
    }

    .instBotoes{
        align-items: center;
        display: flex;
        flex-direction: row;
    }
    
    .botoes{
        display: flex;
        flex-direction: column;
        align-items: center border;
    }

    .btn{
        padding: 10px; 
        margin: 5px;
    }

    h2{
        align-items: center;
    }

    td,th {
        padding: 0px 20px 0px 20px;
        width:20px;
        text-align: center;
    }
</style>
