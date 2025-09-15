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
            $tarefas[] = [
                'id' => $row['id'],
                'nome' => $row['nome'],
                'descricao' => $row['descricao'],
                'data_hora' => $row['data_hora'],
                'status' => $row['status']
            ];
        }

        return $tarefas;
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tarefas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return [
                'id' => $row['id'],
                'nome' => $row['nome'],
                'descricao' => $row['descricao'],
                'data_hora' => $row['data_hora'],
                'status' => $row['status']
            ];
        }

        return null; // caso não encontre
    }


    public function atualizar($id, $tarefa) {
        $stmt = $this->pdo->prepare("UPDATE tarefas SET nome = :nome, descricao = :descricao, status = :status WHERE id = :id");
        $stmt->execute([
            ':nome' => $tarefa->getNome(),
            ':descricao' => $tarefa->getDescricao(),
            ':status' => $tarefa->getStatus(),
            ':id' => $id
        ]);
    }


    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = ?");
        $stmt->execute([$id]);
    }
}
