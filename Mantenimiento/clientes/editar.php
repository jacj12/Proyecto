<?php
require '../conexion.php';

$idCliente = $_GET['idCliente'] ?? null;

if ($idCliente) {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE idCliente = ?");
    $stmt->execute([$idCliente]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['Nombre'];
        $correo = $_POST['Correo'];
        $telefono = $_POST['Telefono'];

        $stmt = $pdo->prepare("UPDATE clientes SET nombre = ?, correo = ?, telefono = ? WHERE idCliente = ?");
        $stmt->execute([$nombre, $correo, $telefono, $idCliente]);

        header("Location: listar.php");
        exit;
    }
} else {
    echo "ID de cliente no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST">
        Nombre: <input type="text" name="Nombre" value="<?= $cliente['Nombre'] ?>" required><br>
        Correo: <input type="email" name="Correo" value="<?= $cliente['Correo'] ?>" required><br>
        Teléfono: <input type="text" name="Telefono" value="<?= $cliente['Telefono'] ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="listar.php">Volver a la lista</a>
</body>
</html>
