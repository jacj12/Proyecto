<?php
require '../conexion.php';

$idProductos = $_GET['idProducto'] ?? null;

if ($idProductos) {
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE idProductos = ?");
    $stmt->execute([$idProductos]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['Nombre'];
        $precio = $_POST['Precio'];
        $stock = $_POST['Stock'];

        $stmt = $pdo->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE idProductos = ?");
        $stmt->execute([$nombre, $precio, $stock, $idProductos]);

        header("Location: listar.php");
        exit;
    }
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST">
        Nombre: <input type="text" name="Nombre" value="<?= $productos['Nombre'] ?>" required><br>
        Precio: <input type="number" step="0.01" name="precio" value="<?= $productos['precio'] ?>"required><br>
        Stock: <input type="number" name="stock" value="<?= $productos['stock'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="listar.php">Volver a la lista</a>
</body>
</html>
