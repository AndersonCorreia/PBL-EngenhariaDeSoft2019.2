<?php
/**
 * Esse controller está na pasta Admin pois mexe com informações que devem ser mantidas
 * em segurança, como email, cpf, telefone, etc. Os metodos desta classe também poderiam
 * estar no InicialController em vez daqui, mas não é de bom tom, pois como falei acima 
 * é uma questão de segurança
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Classe responsável por gerir o cadastro dos visitantes/responsáveis
class CadastroController extends Controller
{
    // cuidara do cadastro normal
    public function cadastroNormal(){

    }
    // cuidara do cadastro pelo Facebook
    public function cadastroFacebook(){

    }
    // cuidara do cadastro pelo Google
    public function cadastroGoogle(){

    }
}
