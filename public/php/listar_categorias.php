<?php
include 'conexion.php';

$sql = "SELECT id_categoria, nombre_categoria,descripcion, imagen_url FROM categorias";
$result = $conn->query($sql);

$categorias = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categorias[] = array('id_categoria' => $row['id_categoria'], 'nombre_categoria' => $row['nombre_categoria'],'descripcion' => $row['descripcion'],  'imagen_url' => $row['imagen_url']);
    }
}

echo json_encode($categorias);

$conn->close();
?>