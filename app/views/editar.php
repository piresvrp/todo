<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h3 mb-4">➕ Editar Tarefa</h1>

            <form action="index.php?action=editar&id=<?php echo $tarefa['id']?>" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required value="<?php echo $tarefa['nome'];?>">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="2" required>
                        <?php echo htmlspecialchars($tarefa['descricao']);?>
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select id="status" name="status" class="form-select">
                        <option value="pendente" <?php echo ($tarefa['status'] == 'pendente') ? 'selected'  : '' ?>>Pendente</option>
                        <option value="concluída" <?php echo ($tarefa['status'] == 'concluída') ? 'selected'  : '' ?>>Concluída</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $tarefa['id'];?>">
                <button type="submit" class="btn btn-success">💾 Salvar</button>
                <a href="../index.php?action=index" class="btn btn-secondary">↩ Voltar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
