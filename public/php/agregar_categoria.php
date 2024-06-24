<?php
include 'conexion.php';

$nombreCategoria = mysqli_real_escape_string($conn, $_POST['nombre_categoria']);
$descripcionCategoria = mysqli_real_escape_string($conn, $_POST['descripcion_categoria']);

// Manejo del archivo de imagen
$target_dir = "../assets/";
$target_file = $target_dir . basename($_FILES["imagen_categoria"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validar si el archivo es una imagen real o una imagen falsa
$check = getimagesize($_FILES["imagen_categoria"]["tmp_name"]);
if($check !== false) {
    move_uploaded_file($_FILES["imagen_categoria"]["tmp_name"], $target_file);
    $imagenUrl = "assets/" . basename($_FILES["imagen_categoria"]["name"]);
} else {
    echo json_encode(array('error' => 'El archivo no es una imagen.'));
    exit;
}

$sql = "INSERT INTO categorias (nombre_categoria, descripcion, imagen_url) VALUES ('$nombreCategoria', '$descripcionCategoria', '$imagenUrl')";

if ($conn->query($sql) === TRUE) {
    $idCategoria = $conn->insert_id;
    $response = array('id_categoria' => $idCategoria, 'nombre_categoria' => $nombreCategoria, 'descripcion' => $descripcionCategoria, 'imagen_url' => $imagenUrl);
    echo json_encode($response);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
