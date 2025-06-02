<?php
require '../conexion.php';

$idProductos = $_GET['idProducto'] ?? null;

if ($idProductos) {
    $stmt = $pdo->prepare("DELETE FROM productos WHERE idProductos = ?");
    $stmt->execute([$idProductos]);
}

header("Location: listar.php");
exit;
?>
