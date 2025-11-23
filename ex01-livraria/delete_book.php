<?php
require 'database.php';

if (!empty($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("DELETE FROM livros WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
