<?php
require_once __DIR__ . '/../app/TarefaController.php';

$controller = new TarefaController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Ação não encontrada!";
}
