<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos Registrados</title>
    <link rel="stylesheet" href="../css/tailwind.css"> <!-- Enlace correcto a Tailwind CSS -->
</head>
<body class="bg-gray-100 py-12 px-4 sm:px-6 lg:px-8 text-[#191d20]">
    <div class="max-w-4xl mx-auto bg-[#dfded9] rounded-lg overflow-hidden shadow-md">
        <h2 class="text-2xl font-bold text-center p-4 bg-[#ed2839] text-white">Productos Registrados</h2>

        <div class="p-4">
            <?php
            include 'conexion.php'; // Incluir archivo de conexión
            // Consultar productos registrados
            $sql = "SELECT id, nombre_producto, descripcion_producto, precio_producto, imagen_producto FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada producto como una tarjeta
                while($row = $result->fetch_assoc()) {
                    echo '<div class="border rounded-lg p-4 mb-4 bg-white shadow">';
                    echo '<h3 class="text-xl font-bold mb-2 text-[#191d20]">' . $row["nombre_producto"] . '</h3>';
                    echo '<p class="text-[#404040] mb-2 break-words whitespace-normal">' . $row["descripcion_producto"] . '</p>';
                    echo '<p class="text-[#404040] mb-2">Precio: $' . $row["precio_producto"] . '</p>';
                    echo '<img src="../img/' . basename($row["imagen_producto"]) . '" class="max-w-xs max-h-xs mb-4">';
                    echo '<div class="flex justify-between">';
                    // Botón de Actualizar
                    echo '<a href="actualizar_producto.php?id=' . $row["id"] . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</a>';
                    // Botón de Eliminar
                    echo '<form method="POST" action="eliminar_producto.php" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este producto?\');" class="inline-block">';
                    echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                    echo '<button type="submit" class="bg-[#ed2839] hover:bg-[#dfded9] text-[#191d20] font-bold py-2 px-4 rounded">Eliminar</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p class='text-[#404040] text-center'>No hay productos registrados aún.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
