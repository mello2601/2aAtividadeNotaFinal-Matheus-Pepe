<?php
require 'database.php';

$pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY vencimento ASC")->fetchAll(PDO::FETCH_ASSOC);
$concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY vencimento ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        h2 { margin-top: 30px; }
        table { border-collapse: collapse; width: 70%; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 8px; }
        form { display: inline; }
        .concluida { text-decoration: line-through; color: gray; }
    </style>
</head>
<body>

<h1>Gerenciador de Tarefas</h1>

<h2>Tarefas Pendentes</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($pendentes as $tarefa): ?>
    <tr>
        <td><?= $tarefa['id'] ?></td>
        <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
        <td><?= $tarefa['vencimento'] ?></td>
        <td>
            <form method="POST" action="update_tarefa.php">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit">Concluir</button>
            </form>

            <form method="POST" action="delete_tarefa.php">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Tarefas Concluídas</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($concluidas as $tarefa): ?>
    <tr class="concluida">
        <td><?= $tarefa['id'] ?></td>
        <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
        <td><?= $tarefa['vencimento'] ?></td>
        <td>
            <form method="POST" action="delete_tarefa.php">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Adicionar Nova Tarefa</h2>
<form action="add_tarefa.php" method="POST">
    <input type="text" name="descricao" placeholder="Descrição" required>
    <input type="date" name="vencimento" required>
    <button type="submit">Adicionar</button>
</form>

</body>
</html>
