<?php

class Tarefa{

    public $nome;
    public $descricao;
    public $data_hora;
    public $status;
    public function __construct($nome, $descricao, $data_hora, $status)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data_hora = $data_hora;
        $this->status = $status;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }

    public function getDataHora(){
        return $this->data_hora;
    }

    public function getStatus(){
        return $this->status;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


}