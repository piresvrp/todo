<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
</head>
<body>
<h1>📋 Minhas Tarefas</h1>
<a href="index.php?action=criar">➕ Nova Tarefa</a>
<ul>
    <?php foreach ($tarefas as $t): ?>
        <li>
            [<?= $t->id ?>] <b><?= htmlspecialchars($t->nome) ?></b> - <?= $t->status ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
