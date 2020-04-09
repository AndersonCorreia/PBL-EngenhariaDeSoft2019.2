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
use App\DB\VisitaDAO;
use App\Model\Visita;
use App\Http\Controllers\Visitante\AgendamentoController;

class VisitaController extends Controller{
    public function getTelaGerenciarVisita(){
        //$id_user = $_SESSION["ID"]; 
        $id_user = 6;
        $DAO = new AgendamentoInstitucionalDAO();
        $lista_espera = $DAO->SELECT_VisitaInstitucionalByStatus("lista de espera");

        //getVisitas
        $array = $this->getVisitasInstitucionais("2020/04/08", "anterior");
        
        $agendamentos_cancelados_usuario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo usuario");
        $agendamentos_cancelados_funcionario = $DAO->SELECT_VisitaInstitucionalByStatus("cancelado pelo funcionario");
        
        $variaveis = [
            'paginaAtual' => "Gerenciamento de Visitas",
            'lista_espera' => $lista_espera,
            'visitas_institucionais' => $array,
            'agendamentos_cancelados_usuario' => $agendamentos_cancelados_usuario,
            'agendamentos_cancelados_funcionario' => $agendamentos_cancelados_funcionario
            
        ];
        return view('telaGerenciamentoDeVisitas.telaGerenciamentoDeVisitas', $variaveis);
    }

    public function confirmaAgendamento(Request $request){
        dd('método confirmaAgendamento()');
        $ID = $request->input('name');
        $DAO = new VisitaDAO();
        $visitaConfirmada = new Visita("1111-11-11", "qualquer", "confirmado", $ID);
        $DAO->UPDATE($visitaConfirmada);
    }
    public function cancelaAgendamento(Request $request){
        dd('método cancelaAgendamento()');
        $ID = $request->input('name');
        $agend = new AgendamentoInstitucional("", "1", "1", "cancelado", $ID);
        (new AgendamentoInstitucionalDAO())->update($agend);
    }
    public function escolherListaEspera(Request $request){
        dd(' método escolherListaEspera()');
        $ID = $request->input('name');
        $DAO = new VisitaDAO();
        $visitaConfirmada = new Visita("1111-11-11", "qualquer", "confirmado", $ID);
        $DAO->UPDATE($visitaConfirmada);
    }

    public function getVisitasInstitucionais($data, $sentido){
        $DAO = new AgendamentoInstitucionalDAO();
        $dataFim = now();
        $dataFim = $dataFim->add(new \DateInterval("P2M"));
        if($sentido == "anterior"){
            $dataAtual = now();  
        }
        else {
            $dataAtual = $data;
        }

        $visitasInst = $DAO->SELECTbyDateInicio_FIM("2020-04-07", "2020-04-14");
        $array = [];
        foreach($visitasInst as $v){
            if(count($array)<12){
                $this->preencherArrayDatas($array, date_create($v['data']) );   
            }
        }

        $dataFinalReal= new \DateTime($array["datas"]["dataLimite"]);
        if ( count($array)>11 ){
            $dataFinalReal->sub(new \DateInterval("P1D"));
        }
        $array["datas"]["dataFim"] = $dataFinalReal->format("d-m-Y");
        
        $array = [
            'datas' => $array['datas'],
            'visitas' => $visitasInst
        ];

        return $array;
    }
    public function preencherArrayDatas(array &$array, \DateTime $data){
        $dm = $data->format("d-m");
        $dma= $data->format("d-m-Y");
        $d = $data->format("d");
        $day = $data->format("w");
        $mes = $data->format("m")-1;
        
        if( !isset($array["datas"]["dataInicio"]) ){
            $array["datas"]["dataInicio"] = "$d-$mes";
            $array["datas"]["data0"] = $data->format("d-m-Y");
        }
        $array["datas"]["dataFim"] = "$d-$mes";
        $array["datas"]["dataLimite"] = $data->format("d-m-Y");
        $array[$dma]["data"] = "$dm $day";
    }

    public function getAgendamentoEsperaDiaTurno(Request $request){
        $ID = $request->input('name');
        $DAO = new VisitaDAO();
        $array = $DAO->SELECT_visita_institucional_byID($ID);
        return $array;

    }

    public function enviarEmailAvisoCancelamento($email, $token, $motivo, $dataAgendamento)
    {
        $dados = [
            'token'=> $token,
            'usuario_email'=> $email,
            'motivo'=> $motivo,
            'data'=> $dataAgendamento,
        ];
        session()->flash("email", $email);
         // Enviando o e-mail
        Mail::send('emails.emailAvisoCancelamento', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Aviso de Cancelamento');
            $message->to( session('email') );
            $message->subject('Aviso de Cancelamento');
        });
        
    }

    public function enviarEmailAvisoConfirmacaoDeAgendamento($email, $token, $dataAgendamento)
    {
        $dados = [
            'token'=> $token,
            'usuario_email'=> $email,
            'data'=> $dataAgendamento,
        ];
        session()->flash("email", $email);
         // Enviando o e-mail
        Mail::send('emails.emailAvisoConfirmacaoDeAgendamento', $dados, function($message){
            $message->from('scorpiusuefs@gmail.com', 'Scorpius - Confirmação de Agendamento');
            $message->to( session('email') );
            $message->subject('Seu agendamento foi confirmado');
        });
        
    }
}
?>