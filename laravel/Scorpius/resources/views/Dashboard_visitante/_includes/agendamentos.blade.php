
<form method="get" action="#">
    {{csrf_field()}}
    @foreach($registros as $registro)
    <div class= "instBotoes">
        <div class="instituicoes card" >
        <table class="table-borderless">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Responsavel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$registro['nome']}}</td>
                    <td>{{$registro['responsavel']}}</td>
                </tr>
            </tbody>
        </table>
        </div>

        <div class="botoes">
                <a class="btn col btn-primary" href="{{route('user.instituicoes.editar', $registro['instituicao_ID'])}}">Confirmar</a>
                <a  href="{{route('user.instituicoes.deletar', $registro['instituicao_ID'])}}" class="btn col btn-danger">Cancelar</a>
        </div>
        </div>
        @endforeach
    
</form>

<style>
    .instituicoes{
        height:100px;    
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
    }
   

</style>
