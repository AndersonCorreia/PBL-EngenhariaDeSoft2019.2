<?php

namespace App\Model;

use App\DB\ExposicaoDAO;

class Exposicao extends \App\DB\interfaces\DataObject
{
    private $titulo;
    private $tipo_evento;
    private $descricao;
    private $quantidade_inscritos;
    private $data_inicial;
    private $data_final;
    private $link_imagem;
    private $exposicao;

    public function __Construct()
    {
        $this->exposicao = new ExposicaoDAO();
    }
    public function novaExposicao($dados): Exposicao
    {
        $this->titulo = $dados['titulo'];
        $this->tipo_evento = $dados['tipo'];
        $this->descricao = $dados['descricao'];
        $this->quantidade_inscritos = $dados['quantidade'];
        $this->data_inicial = $dados['data_inicial'];
        $this->data_final = $dados['data_final'];
        $this->link_imagem = $dados['imagem'];

        $this->exposicao->INSERT($this);
        return $this;
    }

    protected function save()
    {
        (new \app\DB\ExposicaoDAO)->UPDATE($this);
    }

    public function setTitulo($titulo)
    {
        $this->alterado();
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTipo_evento($tipo_evento)
    {
        $this->alterado();
        $this->tipo_evento = $tipo_evento;
    }
    public function getTipo_evento()
    {
        return $this->tipo_evento;
    }

    public function setDescricao($descricao)
    {
        $this->alterado();
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setQuantidade($quantidade_inscritos)
    {
        $this->alterado();
        $this->quantidade_inscritos = $quantidade_inscritos;
    }
    public function getQuantidade()
    {
        return $this->quantidade_inscritos;
    }

    public function setData_Inicial($data_inicial)
    {
        $this->alterado();
        $this->data_inicial = $data_inicial;
    }
    public function getData_Inicial()
    {
        return $this->data_inicial;
    }

    public function setData_Final($data_final)
    {
        $this->alterado();
        $this->data_final = $data_final;
    }
    public function getData_Final()
    {
        return $this->data_final;
    }

    public function setImage($link_imagem)
    {
        $this->alterado();
        $this->link_imagem = $link_imagem;
    }
    public function getImage()
    {
        return $this->link_imagem;
    }
}
