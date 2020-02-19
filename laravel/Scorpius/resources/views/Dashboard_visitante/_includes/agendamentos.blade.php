
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
                <a  href="{{route('confirma',[$registro['ID'],'confirmado'])}}" class="btn col btn-primary" value="{{$registro['Status']}}" confirmar>Confimar</a>
                <a  href="{{route('confirma', [$registro['ID'],'cancelado pelo usuario'])}}" class="btn col btn-danger" value="{{$registro['Status']}}" cancelar>Cancelar</a>
        </div>
        </div>
        @endforeach
    
</form>
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function() {
    //$('[confirmar]').css({"cursor": "default", "pointer-events": "none", "user-select": "none", "opacity": "0.3"}).attr('tabindex', -1);
    //$('[cancelar]').css({"cursor": "default", "pointer-events": "none", "user-select": "none", "opacity": "0.3"}).attr('tabindex', -1);
    let status = $('[confirmar]')
    for(let td of status){
        //console.log(td.setAttribute)
        td.setAttribute("style", "cursor: default; pointer-events: none;user-select:none; opacity: 0.3;");
    }
})

</script>
@endsection
<style>
    .instituicoes{
        height:100px;
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
        align-items: center;
    }

    .btn{
        padding: 10px; 
        margin: 5px;
    }

    h2{
        align-items: center;
    }

    td, th{
        padding: 0px 20px 0px 20px;
        width:100px;
        text-align: center;
    }
   

</style>
