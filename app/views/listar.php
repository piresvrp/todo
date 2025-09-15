<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">📋 Minhas Tarefas</h1>

    <a href="index.php?action=criar" class="btn btn-primary mb-3">
        ➕ Nova Tarefa
    </a>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if (!empty($tarefas)): ?>
                <ul class="list-group">
                    <?php foreach ($tarefas as $t): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-secondary me-2"><?php echo htmlspecialchars($t['id']); ?></span>
                                <b><?php echo htmlspecialchars($t['nome']); ?></b>
                                <span class="text-muted">- <?php echo htmlspecialchars($t['status']); ?></span>
                            </div>
                            <div>
                                <a href="index.php?action=deletar&id=<?php echo htmlspecialchars($t['id']); ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                    🗑️ Deletar
                                </a>
                                <a href="index.php?action=editar&id=<?php echo htmlspecialchars($t['id']); ?>"
                                   class="btn btn-sm btn-success">
                                    🗑️ Editar
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-info">
                    Nenhuma tarefa cadastrada ainda.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
