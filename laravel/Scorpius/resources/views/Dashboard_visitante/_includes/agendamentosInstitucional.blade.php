<form method="get" action="#">
    {{csrf_field()}}
    @foreach($agenda_institucional as $agenda)
    <div class= "instBotoes">
        <div class="instituicoes card" >
        <table class="table-borderless">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Status</th>
                    <th>Turma</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{trim(substr($agenda['Data_Agendamento'], 0, 11))}}</td>
                    <td>{{trim(substr($agenda['Data_Agendamento'], 11, 14))}}</td>
                    <td>{{trim($agenda['Status'])}}</td>
                    <td>{{trim($agenda['ano_escolar'])}}</td>
                    
                </tr>
            </tbody>
        </table>
        </div>

        <div class="botoes">
                <a class="btn col btn-primary" href="{{route('user.instituicoes.editar', $agenda['ID'])}}">Confirmar</a>
                <a  href="{{route('user.instituicoes.deletar', $agenda['ID'])}}" class="btn col btn-danger">Cancelar</a>
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
