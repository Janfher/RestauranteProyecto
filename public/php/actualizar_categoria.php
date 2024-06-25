<?php
include 'conexion.php'; // Incluir archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Obtener los datos del formulario
    $id = $conn->real_escape_string($_POST["id"]);
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $descripcion = $conn->real_escape_string($_POST["descripcion"]);

    // Inicializar variables para la imagen
    $ruta_imagen = ''; // Variable para la ruta de la imagen

    // Verificar si se ha subido una nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        $imagen_nombre = $_FILES["imagen"]["name"];
        $imagen_tmp = $_FILES["imagen"]["tmp_name"];
        $imagen_tipo = $_FILES["imagen"]["type"];

        $upload_dir = '../img/';
        $ruta_imagen = $upload_dir . basename($imagen_nombre);

        // Intentar mover la imagen al directorio de carga
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            // Actualizar la base de datos con la nueva ruta de imagen
            $sql = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion', imagen_categoria='$ruta_imagen' WHERE id='$id'";
        } else {
            echo "Error al subir la imagen.";
            exit; // Salir del script si hay un error con la subida de la imagen
        }
    } else {
        // Si no se subió una nueva imagen, actualizar solo los datos de texto
        $sql = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion' WHERE id='$id'";
    }

    // Ejecutar la consulta SQL para actualizar los datos
    if ($conn->query($sql) === TRUE) {
        echo "La categoría se actualizó correctamente.";
    } else {
        echo "Error al actualizar la categoría: " . $conn->error;
    }
} else {
    echo "No se recibieron datos válidos para actualizar.";
}

$conn->close(); // Cerrar la conexión a la base de datos
?>
