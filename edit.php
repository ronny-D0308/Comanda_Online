<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

include('config.php');

$sql = "SELECT * FROM vale WHERE Id = $id";

// Preparar a consulta usando PDO
$stmt = $pdo->prepare($sql);

// Associar o valor do parâmetro 'id' (usando o nome do parâmetro :id)
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Executar a consulta
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Buscar o resultado da consulta
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql_del = "DELETE FROM vale WHERE id = $id";
    $stmt_del = $pdo->prepare($sql_del);
    $stmt_del->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_del->execute();

    header('Location: Central_adm.php');
    exit();
?>
