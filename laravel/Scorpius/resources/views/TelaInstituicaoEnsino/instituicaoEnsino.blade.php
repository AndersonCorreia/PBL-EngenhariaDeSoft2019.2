<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instituição de ensino</title>
</head>
<body>
<h1>Instituições de ensino</h1> 

<form method="GET" action="/visitante/instituicaoEnsino">
    {{csrf_field()}}
    <nav>
        <nav>aqui vai ter as informações sobre as escolas</nav>
        <button >Atualizar dados</button>
        <button >Deletar</button>
    </nav>
    <h1>Cadastro de instituições</h1>
    <input type="text" name="name" placeholder="Nome da instituicão de ensino">
    <button >Buscar</button>
    <input type="text" name="name" placeholder="Nome do responsável pela instituição">
    <input type="text" name="name" placeholder="Telefone">
    <input type="text" name="name" placeholder="Cidade">
    <input type="text" name="name" placeholder="Endereço">
    <input type="text" name="name" placeholder="Tipo de instituição (pública ou particular)">
    <input type="text" name="name" placeholder="Nível de ensino">
    <button >Incluir</button>
    <button >Alterar</button>
</form>
</body>
<style>
    input{
        display: block;
        margin-bottom:10px;
    }

    input[type=text]{
        display: block;
        width:300px;

    }
</style>
</html>

