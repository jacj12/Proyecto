<?php
require '../conexion.php';

$idCliente = $_GET['idCliente'] ?? null;

if ($idCliente) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE idCliente = ?");
    $stmt->execute([$idCliente]);
}

header("Location: listar.php");
exit;
?>
