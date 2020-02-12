<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once __DIR__."/../../../resources/views/util/layoutUtil.php";

function baixaPDF($diretorio, $nome){
    $bool = false;
    $arquivo_nome = "{$nome}";
    $arquivo = "{$caminho}/{$nome}";

    if(!empty($arquivo_nome) && file_exists(arquivo)){
        header('Content-type: application/pdf');
        header("Content-disposition: attachment; filename='{$arquivo_nome}'");
        $bool = readfile($arquivo);
    }

    return $bool;
}