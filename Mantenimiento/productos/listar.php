<?php
require '../conexion.php';

$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
    <h2>Lista de Productos</h2>
    <a href="crear.php">Agregar Producto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['idProductos'] ?></td>
            <td><?= htmlspecialchars($producto['Nombre']) ?></td>
            <td><?= number_format($producto['Precio'], 2) ?></td>
            <td><?= $producto['Stock'] ?></td>
            <td>
                <a href="editar.php?idProducto=<?= $producto['idProductos'] ?>">Editar</a>
                <a href="eliminar.php?idProducto=<?= $producto['idProductos'] ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="../index.html">Volver al inicio</a>
</body>
</html>
