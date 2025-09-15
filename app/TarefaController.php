<?php
require_once 'Conexao.php';
require_once 'Tarefa.php';
require_once 'TarefaFactory.php';
require_once 'TarefaRepository.php';

class TarefaController {
    private $repo;

    public function __construct() {
        $db = Conexao::getInstance()->getConnection();
        $this->repo = new TarefaRepository($db);
    }

    public function index() {
        $tarefas = $this->repo->listar();
        include __DIR__ . "/views/listar.php";
        }


    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Atualiza a tarefa no banco
            $tarefa = TarefaFactory::create($_POST['nome'], $_POST['descricao'], $_POST['status']);
            $this->repo->atualizar($id, $tarefa);

            // Redireciona para a lista
            header("Location: index.php?action=index");
            exit;
        } else {
            // Mostra o formulário com os dados da tarefa
            $tarefa = $this->repo->getById($id);
            include __DIR__ . "/views/editar.php";
        }
    }


    public function criar() {
        include __DIR__ . "/views/form.php";
    }

    public function deletar($id)
    {
        //var_dump($id);die;
        $this->repo->deletar($id);
        $this->index();
    }

    public function salvar() {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : "pendente";

        if ($nome && $descricao) {
            $tarefa = TarefaFactory::create($nome, $descricao, $status);
            $this->repo->salvar($tarefa);
            header("Location: index.php?action=index");
            exit;
        } else {
            echo "Erro: Nome e descrição obrigatórios!";
        }
    }
}
