<?php
require_once '../app/TarefaController.php';

$controller = new TarefaController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'deletar':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->deletar($id);
        break;

    case 'criar':
        $controller->criar();
        break;

    case 'salvar':
        $controller->salvar();
        break;
    case 'editar':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->editar($id);
        break;


    case 'index':
    default:
        $controller->index();
        break;
}
