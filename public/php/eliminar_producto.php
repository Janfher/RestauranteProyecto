<?php
include 'conexion.php';

<<<<<<< HEAD:public/php/eliminar_producto.php
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
=======
$data = json_decode(file_get_contents("php://input"));
$idCategoria = mysqli_real_escape_string($conn, $data->id_categoria);

$sql = "DELETE FROM categorias WHERE id_categoria = '$idCategoria'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Categoría eliminada correctamente'));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
>>>>>>> 5ac143177860bd06674091c9002a79b843ee7957:public/php/eliminar_categoria.php
}

$conn->close();
?>
