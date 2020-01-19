<?php

use App\Model\Exposicao;

$temp = $_FILES["imagem"]["tmp_name"];
$link_imagem=$_FILES["imagem"]["name"];

setImage($link_imagem);
move_uploaded_file($temp,"public/img/".$link_imagem);

header("Location: testeEnviarImg.php");

?>