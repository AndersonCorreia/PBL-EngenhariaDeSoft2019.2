<?php

use App\Model\Exposicao;

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <head>
    <body>
        <form name="formEnviar" action="enviar.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="imagem" value=""/>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
    <body>
</html>