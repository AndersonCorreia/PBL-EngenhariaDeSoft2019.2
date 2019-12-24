@extends('layout.templateGeralTelasUsuarios')

@section('title', 'Atualizar dados')

@section('conteudo')

<h1>Colégio X</h1>
<div>
    <h2>Dados da instituição de ensino</h2>
    <form action="">
        <fieldset>
            <div class="form-group">
                <input type="text" name="name" placeholder="Nome da instituicão de ensino">
                <input type="text" name="name" placeholder="Nome do responsável pela instituição">
                <input type="text" name="name" placeholder="Telefone">
                <input type="text" name="name" placeholder="Endereço">
                <input type="text" name="name" placeholder="Cidade">
                <input type="text" name="name" placeholder="Estado">
                <input type="text" name="name" placeholder="Numero">
                <input type="text" name="name" placeholder="CEP">
                <input type="text" name="name" placeholder="Tipo de instituição (pública ou particular)">
            </div>
            <div class="box-actions">
			    <button type="submit" class="btn">Atualizar dados</button>
                <button type="submit" class="btn">Cancelar</button>
		    </div>
        </fieldset>
    </form>
</div>
@endsection