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
use App\Model\Professor_instituicao;

use App\DB\CheckinDAO;

class DashboardController extends Controller{
    
    /**
    * Retorna Dashboard do Funcionário;
    * @return dashboardFuncionario
    */
    public function getTelaDashboardFuncionario(){
        $visitantes = $this->listaGeralVisitantes();

        $variaveis = [
            'visitantes' => $visitantes,
            //'paginaAtual' => "Painel de Controle do Funcionário"
        ];
        return view('TelaDashboardFuncionario.telaDashboardFuncionario', $variaveis);
    }

    public function listaVisitantesEstagiario()
    {
        $lista = $this->listaGeralVisitantes();
        if(count($lista) > 0){
            $primeiro = $lista[0];
            foreach($lista as $visita){
                if($primeiro['dia']['data'] == $visita['dia']['data']){
                    if($primeiro['dia']['turno'] == 'manhã'){
                        return $primeiro;
                    }
                    else if($visita['dia']['turno'] == 'manhã'){
                        $primeiro = $visita;
                    }else if($visita['dia']['turno'] != $primeiro['dia']['turno']){
                        if($primeiro['dia']['turno'] == 'noite'){
                            if($visita['dia']['turno'] == 'tarde'){
                                $primeiro = $visita;
                            }
                        }
                    }
                }
            }
            return $primeiro;
        }
    }

    public function listaGeralVisitantes()
    {
        return $this->selectionSort($this->organizarDatas($this->selectAlunos(), $this->selectUsuarios()));
    }

       /**
     * Ordena todas as visitas pela da data
     */
    public function selectionSort($vet){
        $tam = count($vet) - 1;
        $i = 0; 
        $j = 0; 
        $min = 0; 
        $x = 0;
        // dd($vet);
        for ($i=1; $i<=$tam-1; $i++){
            $min = $i;
            for ($j=$i+1; $j<=$tam; $j++){
                    if (strtotime($vet[$j]['dia']['data']) < strtotime($vet[$min]['dia'][ 'data']))
                        $min = $j;
            }
            $x = $vet[$min];
            $vet[$min] = $vet[$i];
            $vet[$i] = $x;
        }
        return $vet;
    }

    /**
     * Retorna todos os alunos de todas as visitas não realizadas e de agendamentos confirmados
     */
    public function selectAlunos()
    {
        $alunos = new CheckinDAO();
        // dd($alunos->SELECT_ALUNOS());
        return $alunos->SELECT_ALUNOS();
    }

    /**
     * Retorna todos os usuarios comuns de todas as visitas não realizadas e de agendamentos confirmados
     */
    public function selectUsuarios()
    {
        $usuarios = new CheckinDAO();
        // dd($usuarios->SELECT_USUARIOS());
        return $usuarios->SELECT_USUARIOS();

    }

    /**
    * Junta todas as visitas de Instituições e Usuarios comuns por data
    */
    public function organizarDatas($alunos, $usuarios)
    {
        $dataChecadas = array();
        $listaFinal = array();
        // dd($alunos, $usuarios);

        foreach($alunos as $aluno){
            if(!in_array(['data' => $aluno['data'], 'turno' => $aluno['turno']], $dataChecadas)){
                $dataChecadas[] = [
                    'data' => $aluno['data'],
                    'turno' => $aluno['turno']
                ];
            }
        }
        foreach($usuarios as $usuario){
            if(!in_array(['data' => $usuario['data'], 'turno' => $usuario['turno']], $dataChecadas)){
                $dataChecadas[] = [
                    'data' => $usuario['data'],
                    'turno' => $usuario['turno']
                ];
            }
        }
        foreach($dataChecadas as $dataTurno){
            $dataVisitantes = array();
            foreach($alunos as $aluno){
                if($dataTurno['data'] == $aluno['data'] && $dataTurno['turno'] == $aluno['turno']){
                    $dataVisitantes[] = $aluno;
                }
            }
            foreach($usuarios as $usuario){
                if($dataTurno['data'] == $usuario['data'] && $dataTurno['turno'] == $usuario['turno']){
                    $dataVisitantes[] = $usuario;
                }
            }
            if(!empty($alunos)){
                $visita_ID = $alunos[0]['visita_ID'];
            }else{
                $visita_ID = $usuarios[0]['visita_ID'];
            }
            $listaFinal[] = [
                'dia' => $dataTurno,
                'visitantes' => $dataVisitantes,
                'visita_ID' => $visita_ID
            ];
        }
        // dd($listaFinal);
        return $listaFinal;
    }
    public function checkinAluno(Request $req)
    {
        $alunos = new CheckinDAO();
        $resultado = $alunos->UPDATE_STATUS_ALUNO($req->ID, $req->status);   
        $msg = [
            'data' => $resultado,
            'dados' => [$req->ID, $req->status],
            'success' => 'Aluno editado com sucesso',
            'erro' => 'Não foi possível editar o aluno'
        ];
        
        return Response::json($msg);
    }
    public function checkinUsuario(Request $req)
    {
        $usuarios = new CheckinDAO();
        $resultado = $usuarios->UPDATE_STATUS_USUARIO($req->ID, $req->status);
        $msg = [
            'data' => $resultado,
            'success' => 'Usuário editado com sucesso',
            'erro' => 'Não foi possível editar o usuário'
        ];
        return Response::json($msg);
    }

    public function concluirVisita(Request $req)
    {
        $visita = new CheckinDAO();
        $resultado = $visita->UPDATE_VISITA($req->ID, $req->status);
        $msg = [
            'data' => $resultado,
            'success' => 'Visita editada com sucesso',
            'erro' => 'Não foi possível editar a visita'
        ];
        return Response::json($msg);
    }

}
?>