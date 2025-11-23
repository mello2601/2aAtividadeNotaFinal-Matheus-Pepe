<?php
require 'database.php';

$result = $db->query("SELECT * FROM livros ORDER BY id ASC");
$livros = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 60%; }
        table, th, td { border: 1px solid black; padding: 8px; }
        form { margin-top: 20px; }
    </style>
</head>
<body>

<h2>Livros cadastrados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>
    <?php foreach($livros as $livro): ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= $livro['ano'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Adicionar Livro</h3>
<form action="add_book.php" method="POST">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="autor" placeholder="Autor" required>
    <input type="number" name="ano" placeholder="Ano" required>
    <button type="submit">Adicionar</button>
</form>

<h3>Excluir Livro</h3>
<form action="delete_book.php" method="POST">
    <input type="number" name="id" placeholder="ID do livro" required>
    <button type="submit">Excluir</button>
</form>

</body>
</html>
