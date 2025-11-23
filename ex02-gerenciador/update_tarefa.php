<?php
require 'database.php';

if (!empty($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
