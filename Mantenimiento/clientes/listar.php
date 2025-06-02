<?php
require '../conexion.php';

$stmt = $pdo->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Lista de Clientes</h2>
    <a href="crear.php">Agregar Cliente</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['idCliente'] ?></td>
            <td><?= $cliente['Nombre'] ?></td>
            <td><?= $cliente['Correo'] ?></td>
            <td><?= $cliente['Telefono'] ?></td>
            <td>
                <a href="editar.php?idCliente=<?= $cliente['idCliente'] ?>">Editar</a>
                <a href="eliminar.php?idCliente=<?= $cliente['idCliente'] ?>" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="../index.html">Volver al inicio</a>
</body>
</html>
