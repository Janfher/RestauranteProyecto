<?php
include 'conexion.php';

// Verificar si hay datos recibidos y son válidos
$data = $_POST; // Utilizar $_POST directamente si estás enviando los datos como FormData
if (!isset($data['id_categoria']) || !isset($data['nombre_categoria']) || !isset($data['descripcion_categoria'])) {
    echo json_encode(array('error' => 'No se recibieron todos los datos necesarios para actualizar la categoría.'));
    exit;
}

// Obtener los datos recibidos
$idCategoria = mysqli_real_escape_string($conn, $data['id_categoria']);
$nombreCategoria = mysqli_real_escape_string($conn, $data['nombre_categoria']);
$descripcionCategoria = mysqli_real_escape_string($conn, $data['descripcion_categoria']);

// Verificar si se subió una nueva imagen y procesarla si es necesario
if (isset($_FILES['imagen_categoria']) && $_FILES['imagen_categoria']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($_FILES["imagen_categoria"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validar si el archivo es una imagen real
    $check = getimagesize($_FILES["imagen_categoria"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES["imagen_categoria"]["tmp_name"], $target_file);
        $imagenUrl = "assets/" . basename($_FILES["imagen_categoria"]["name"]);
    } else {
        echo json_encode(array('error' => 'El archivo no es una imagen.'));
        exit;
    }

    // Actualizar la categoría con la nueva imagen
    $sql = "UPDATE categorias SET nombre_categoria = '$nombreCategoria', descripcion = '$descripcionCategoria', imagen_url = '$imagenUrl' WHERE id_categoria = '$idCategoria'";
} else {
    // Actualizar la categoría sin cambiar la imagen
    $sql = "UPDATE categorias SET nombre_categoria = '$nombreCategoria', descripcion = '$descripcionCategoria' WHERE id_categoria = '$idCategoria'";
}

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Categoría actualizada correctamente'));
} else {
    echo json_encode(array('error' => 'Error al actualizar la categoría: ' . $conn->error));
}

$conn->close(); // Cerrar conexión a la base de datos
?>
