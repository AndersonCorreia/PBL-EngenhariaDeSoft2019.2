<?php
/**
 * Esse controller está na pasta Funcionario pois mexe com informações que devem ser mantidas
 * em segurança, como email, cpf, telefone, etc. Os metodos desta classe também poderiam
 * estar no InicialController em vez daqui, mas não é de bom tom, pois como falei acima 
 * é uma questão de segurança
 */
namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\DB\AgendamentoInstitucionalDAO;
use App\DB\PessoaDAO;
use App\model\AgendamentoInstitucional;
use App\DB\VisitaDAO;
use App\Model\Visita;
use App\Http\Controllers\Visitante\AgendamentoController;

class VisitaController extends Controller{
    public function getTelaGerenciarVisita(){
        $DAO = new AgendamentoInstitucionalDAO();
        $lista_espera = $DAO->SELECT_VisitaInstitucionalByStatus("lista de espera");

        //getVisitas
        $array = $this->getVisitasInstitucionais("2020/04/08", "anterior");
        
        $agendamentos_cancelados_usuario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo usuario");
        $agendamentos_cancelados_funcionario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo funcionario");
        $i = 0;
        $variaveis = [
            'paginaAtual' => "Gerenciamento de Visitas",
            'lista_espera' => $lista_espera,
            'visitas_institucionais' => $array,
            'agendamentos_cancelados_usuario' => $agendamentos_cancelados_usuario,
            'agendamentos_cancelados_funcionario' => $agendamentos_cancelados_funcionario,
            'i' => $i
        ];
        return view('telaGerenciamentoDeVisitas.telaGerenciamentoDeVisitas', $variaveis);
    }

    public function confirmaAgendamento(Request $request){
        $ID = $request->agendamentoID;
        $DAO = new AgendamentoInstitucionalDAO();
        //$Agendamento = new AgendamentoInstitucional("qualquer", "qualquer", "qualquer", false, "confirmado", $ID);
        //$DAO->UPDATE($Agendamento);//o update só atualiza o status
        $DAO->confirmaAgendamento("agendamento_institucional", "confirmado", $ID);
        (new VisitaDAO)->confirmaVisita("visita_institucional", "confirmado", $ID);
        $email = (new PessoaDAO)->SELECTbyID($request->usuarioID)["email"];
        $data = now()->format("d/m/Y");
        $this->enviarEmailAvisoConfirmacaoDeAgendamento($email, $data);
        return $this->getTelaGerenciarVisita();
    }

    public function cancelaAgendamento(Request $request){
        $ID = $request->agendamentoID;
        
        $DAO = new AgendamentoInstitucionalDAO();
        //$Agendamento = new AgendamentoInstitucional("qualquer", "qualquer", "qualquer", false, "cancelado pelo funcionario", $ID);
        //$DAO->UPDATE($Agendamento);//o update só atualiza o status
        $DAO->confirmaAgendamento("agendamento_institucional", "cancelado pelo funcionario", $ID);
        (new VisitaDAO)->confirmaVisita("visita_institucional", "cancelado pelo funcionario", $ID);
        $email = (new PessoaDAO)->SELECTbyID($request->usuarioID)["email"];
        $data = now()->format("d/m/Y");
        if($request->radio == "CC"){
            $motivo = "condições climaticas";
        }
        else {
            $motivo = $request->motivo;
        }
        $this->enviarEmailAvisoCancelamento($email, $data, $motivo);
        return $this->getTelaGerenciarVisita();
    }

    public function escolherListaEspera(Request $request){
        //confirma o agendamento da lista de espera
        $ID = $request->agendamentoIDconfirmado;
        $DAO = new AgendamentoInstitucionalDAO();
        $DAO->confirmaAgendamento("agendamento_institucional", "confirmado", $ID);
        (new VisitaDAO)->confirmaVisita("visita_institucional", "confirmado", $ID);
        $email = (new PessoaDAO)->SELECTbyID($request->usuarioIDconfirmado)["email"];
        $data = now()->format("d/m/Y");
        $this->enviarEmailAvisoConfirmacaoDeAgendamento($email, $data);

        //cancela o agendamento que estava pendente 
        $IDcanc = $request->agendamentoIDcancelado;
        $DAO->confirmaAgendamento("agendamento_institucional", "cancelado pelo funcionario", $IDcanc);
        (new VisitaDAO)->confirmaVisita("visita_institucional", "cancelado pelo funcionario", $IDcanc);
        $email = (new PessoaDAO)->SELECTbyID($request->usuarioIDcancelado)["email"];
        $data = now()->format("d/m/Y");
        if($request->radio == "CC"){
            $motivo = "condições climaticas";
        }
        else {
            $motivo = $request->motivo;
        }
        $this->enviarEmailAvisoCancelamento($email, $data, $motivo);

        return $this->getTelaGerenciarVisita();
    }

    public function getVisitasInstitucionais($data, $sentido){
        $DAO = new AgendamentoInstitucionalDAO();

        $visitasInst = $DAO->SELECTbyDateInicio_FIM("2020-03-21", "2020-04-16");
        $datas = $DAO->SELECTdatas("2020-03-21", "2020-04-16");
        $array = [];
        foreach($datas as $d){
            $c = count($array); 
            if($c < 5){
                $this->preencherArrayDatas($array, date_create($d[0]), count($datas));  
            }
        }
        $visitasInstitucionais = [
            'datas' => $array,
            'visitas' => $visitasInst
        ];
        return $visitasInstitucionais;
    }

    public function preencherArrayDatas(array &$array, \DateTime $data, int $cd){
        $c = count($array);
        if( !isset($array["dataInicio"]) ){
            $array["dataInicio"] = $data->format("d-m-Y");
        }elseif($c < $cd-1){
            $array[$c] = $data->format("d-m-Y");
        }else{
            $array["dataFim"] = $data->format("d-m-Y");
        }

    }

    public function getAgendamentoEsperaDiaTurno(Request $request){
        $ID = $request->input('name');
        $DAO = new VisitaDAO();
        $array = $DAO->SELECT_visita_institucional_byID($ID);
        return $array;

    }

    public function enviarEmailAvisoCancelamento($email, $dataAgendamento, $motivo)
    {
        $dados = [
            'usuario_email'=> $email,
            'motivo'=> $motivo,
            'data'=> $dataAgendamento,
        ];
        session()->flash("email", $email);
         // Enviando o e-mail
        \Mail::send('emails.emailAvisoCancelamento', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Aviso de Cancelamento');
            $message->to( session('email') );
            $message->subject('Aviso de Cancelamento');
        });
        
    }

    public function enviarEmailAvisoConfirmacaoDeAgendamento($email, $dataAgendamento)
    {
        $dados = [
            'data'=> $dataAgendamento,
        ];
        session()->flash("email", $email);
         // Enviando o e-mail
        \Mail::send('emails.emailAvisoConfirmacaoDeAgendamento', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Confirmação de Agendamento');
            $message->to( session('email') );
            $message->subject('Seu agendamento foi confirmado');
        });
        
    }
}
?>