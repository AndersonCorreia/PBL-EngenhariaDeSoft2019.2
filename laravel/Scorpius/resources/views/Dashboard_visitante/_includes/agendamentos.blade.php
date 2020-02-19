
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
                    <td>{{trim(substr($registro['Data_Agendamento'], 0, 11))}}</td>
                    <td>{{trim(substr($registro['Data_Agendamento'], 11, 14))}}</td>
                    <td>{{trim($registro['Status'])}}</td>
                </tr>
            </tbody>
        </table>
        </div>

        <div class="botoes">
            
                <a  href="{{route('confirma',[$registro['ID'],'confirmado'])}}" class="btn col btn-primary">Confimar</a>
                <a  href="{{route('confirma', [$registro['ID'],'cancelado pelo usuario'])}}" class="btn col btn-danger">Cancelar</a>
        </div>
        </div>
        @endforeach
    
</form>

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
