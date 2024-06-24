<?php
include 'conexion.php'; // Incluir archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID de la categoría a eliminar
    $id = $_POST["id"];
    
    // Eliminar la categoría de la base de datos
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Producto eliminada exitosamente.";
    } else {
        echo "Error al eliminar la producto: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirigir de vuelta a la página de categorías
    header("Location: ver_productos.php");
    exit();
}
?>
