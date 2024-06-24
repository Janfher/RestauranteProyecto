<?php
include 'conexion.php';

$data = json_decode(file_get_contents("php://input"));
$idCategoria = mysqli_real_escape_string($conn, $data->id_categoria);

$sql = "DELETE FROM categorias WHERE id_categoria = '$idCategoria'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Categoría eliminada correctamente'));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
