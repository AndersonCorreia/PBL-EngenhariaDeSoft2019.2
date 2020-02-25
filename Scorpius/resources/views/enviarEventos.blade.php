@include('layouts._includes.top')
@section('title', 'Enviar imagens')
<div class="container text-center">
    <p class="h1">Aqui você pode enviar novos eventos para o banco</p>
    <form class="form-group" name="formEnviar" action="" method="POST" enctype="multipart/form-data">
        {{csrf_field() }}
        <input class="form-control" type="text" name="titulo" placeholder="Titulo"><br>
        <div class="form-group">
            <select class="form-control" name="evento">
                <option value="atividade permanente">Atividade Permanente</option>
                <option value="atividade diferenciada">Atividade Diferenciada</option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="tema">
                <option value="NULL"></option>
                <option value="astronomia">Astronomia</option>
                <option value="biodiversidade">Biodiversidade</option>
                <option value="origem do humano">Origem do Humano</option>
            </select>
        </div>
        <input class="form-control" type="text" name="descricao" placeholder="Descricao"><br>
        <input class="form-control" type="text" name="quantidade" placeholder="Quantidade (ex: 40)"><br>
        <input class="form-control" type="text" name="data_inicial"
            placeholder="Data de inicio (ano-mes-dia, ex: 2020-01-01)"><br>
        <input class="form-control" type="text" name="data_final"
            placeholder="Data do fim (ano-mes-dia, ex: 2020-01-02)"><br>
        <input class="btn btn-primary btn-lg btn-block" type="file" name="imagem" placeholder="Imagem" /><br>
        <input class="btn btn-success btn-lg btn-block" type="submit" value="Enviar" name="enviar" /><br>
        @if ($try == 'TRUE')
        <label class="btn btn-success">Enviado com sucesso</label>
        @elseif ($try == 'FALSE')
        <label class="btn btn-danger">ERROR: {{$log}}</label>
        @endif
    </form>
</div>

@include('layouts._includes.footer')