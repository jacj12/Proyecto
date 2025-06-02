<?php
require '../conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("INSERT INTO clientes (nombre, correo, telefono) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $correo, $telefono]);

    header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
    <h2>Agregar Cliente</h2>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Correo: <input type="email" name="correo" required><br>
        Teléfono: <input type="text" name="telefono"><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="listar.php">Volver a la lista</a>
</body>
</html>


    