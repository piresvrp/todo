<?php
require_once 'Tarefa.php';

class TarefaRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function salvar(Tarefa $tarefa) {
        $stmt = $this->pdo->prepare("INSERT INTO tarefas (nome, descricao, data_hora, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $tarefa->nome,
            $tarefa->descricao,
            $tarefa->data_hora,
            $tarefa->status
        ]);

        $tarefa->id = $this->pdo->lastInsertId();
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM tarefas ORDER BY id DESC");
        $tarefas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tarefas[] = new Tarefa(
                $row['nome'],
                $row['descricao'],
                $row['data_hora'],
                $row['status'],
                $row['id']
            );
        }

        return $tarefas;
    }

    public function atualizar(Tarefa $tarefa) {
        $stmt = $this->pdo->prepare("UPDATE tarefas  SET nome = ?, descricao = ?, data_hora = ?, status = ?  WHERE id = ?");
        $stmt->execute([
            $tarefa->nome,
            $tarefa->descricao,
            $tarefa->data_hora,
            $tarefa->status,
            $tarefa->id
        ]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = ?");
        $stmt->execute([$id]);
    }
}
