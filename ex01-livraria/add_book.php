<?php
require 'database.php';

if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['ano'])) {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = intval($_POST['ano']);

    $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)");
    $stmt->execute([$titulo, $autor, $ano]);
}

header("Location: index.php");
exit;
?>
