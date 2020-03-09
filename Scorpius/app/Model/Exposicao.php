<?php

namespace App\Model;

use App\DB\ExposicaoDAO;

class Exposicao extends \App\DB\interfaces\DataObject
{
    private $titulo;
    private $tipo_evento;
    private $tema;
    private $turno;
    private $descricao;
    private $quantidade_inscritos;
    private $data_inicial;
    private $data_final;
    private $imagem;
    private $exposicao;

    public function __Construct()
    {
        $this->exposicao = new ExposicaoDAO();
    }
    public function novaExposicao($dados): Exposicao
    {
       
        $this->titulo = $dados['titulo'];
        $this->tipo_evento = $dados['tipo'];
        $this->tema = $dados['tema'];
        $this->turno = $dados['turno'];
        $this->descricao = $dados['descricao'];
        $this->quantidade_inscritos = $dados['quantidade'];
        $this->data_inicial = $dados['data_inicial'];
        $this->data_final = $dados['data_final'];
        $this->imagem = $dados['imagem'];
        $this->exposicao->INSERT($this);
        return $this;
    }

    protected function save()
    {
        (new \app\DB\ExposicaoDAO)->UPDATE($this);
    }

    public function setTitulo($titulo)
    {
        $this->setAlterado();
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function setTurno($turno){
        $this->setAlterado();
        $this->turno = $turno;
    }

    public function setTipo_evento($tipo_evento)
    {
        $this->setAlterado();
        $this->tipo_evento = $tipo_evento;
    }
    public function getTipo_evento()
    {
        return $this->tipo_evento;
    }
    public function setTema($tema)
    {
        $this->setAlterado();
        $this->tema = $tema;
    }
    public function getTema()
    {
        return $this->tema;
    }

    public function setDescricao($descricao)
    {
        $this->setAlterado();
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setQuantidade($quantidade_inscritos)
    {
        $this->setAlterado();
        $this->quantidade_inscritos = $quantidade_inscritos;
    }
    public function getQuantidade()
    {
        return $this->quantidade_inscritos;
    }

    public function setData_Inicial($data_inicial)
    {
        $this->setAlterado();
        $this->data_inicial = $data_inicial;
    }
    public function getData_Inicial()
    {
        return $this->data_inicial;
    }

    public function setData_Final($data_final)
    {
        $this->setAlterado();
        $this->data_final = $data_final;
    }
    public function getData_Final()
    {
        return $this->data_final;
    }

    public function setImage($imagem)
    {
        $this->setAlterado();
        $this->imagem = $imagem;
    }
    public function getImage()
    {
        return $this->imagem;
    }
}
