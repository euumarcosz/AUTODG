<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidade = $_POST['quantidade'];
    $observacao = $_POST['observacao'] ?? '';

    $db = conectarBanco();
    $stmt = $db->prepare('INSERT INTO registros (quantidade, observacao) VALUES (:quantidade, :observacao)');
    $stmt->bindValue(':quantidade', $quantidade, SQLITE3_INTEGER);
    $stmt->bindValue(':observacao', $observacao, SQLITE3_TEXT);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
