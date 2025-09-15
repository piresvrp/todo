<?php

require_once 'Tarefa.php';
class TarefaRecorrente extends Tarefa
{
    public $prioridade;

    public function __construct($nome, $descricao, $data_hora, $status, $prioridade){
        parent::__construct($nome, $descricao, $data_hora, $status);
        $this->prioridade = $prioridade;
    }

    public function getPrioridade() {
        return $this->prioridade;
    }
}

$tarefa2 = new TarefaRecorrente("Entregar trabalho", "Projeto de OOP", date("Y-m-d"), "pendente", "alta");
echo $tarefa2->getNome();
echo $tarefa2->getPrioridade();