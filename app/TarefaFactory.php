<?php

require_once 'Tarefa.php';
class TarefaFactory{

    public static function create($nome, $descricao, $status){
        return new Tarefa($nome, $descricao, Date("Y-m-d"), $status);
    }
}