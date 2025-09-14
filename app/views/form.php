<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Tarefa</title>
</head>
<body>
<h1>Criar Tarefa</h1>
<form action="index.php?action=salvar" method="post">
    <label>Nome:</label><br>
    <label>
        <input type="text" name="nome" required>
    </label><br><br>

    <label>Descrição:</label><br>
    <label>
        <textarea name="descricao" required></textarea>
    </label><br><br>

    <label>Status:</label><br>
    <label>
        <select name="status">
            <option value="pendente">Pendente</option>
            <option value="concluída">Concluída</option>
        </select>
    </label><br><br>

    <button type="submit">Salvar</button>
</form>
</body>
</html>
