<?php
include 'php/conexion.php';

// Obtener el id de la categoría de la URL
$categoria_id = isset($_GET['categoria_id']) ? intval($_GET['categoria_id']) : 0;
$status = isset($_GET['status']) ? $_GET['status'] : '';

if ($categoria_id == 0) {
    die("Error: No se recibió el ID de la categoría.");
}

// Obtener los productos de la categoría
$sql_productos = "SELECT id, nombre_producto, descripcion_producto, precio_producto, imagen_producto FROM productos WHERE categoria_id = $categoria_id";
$result_productos = $conn->query($sql_productos);

if (!$result_productos) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Lista de Productos</title>
    <!-- Incluir Tailwind CSS -->
    <link rel="stylesheet" href="css/tailwind.css"> <!-- Asegúrate de que este enlace apunte correctamente a Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluir SweetAlert -->
    <script>
        function showAlert(message, icon) {
            Swal.fire({
                title: 'Estado del Registro',
                text: message,
                icon: icon,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'registro_producto.php?categoria_id=<?php echo $categoria_id; ?>';
                }
            });
        }
    </script>
</head>
<body class="bg-center bg-cover" style="background-image: url('img/fondo.jpg'); background-size: 40%; background-position: center;">
    <!-- Barra de navegación -->
    <nav class="bg-[#dfded9] shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="index.html">
                            <img class="h-12 w-auto rounded-full border-2 border-[#ed2839]" src="img/logo.jpg" alt="Logo">
                        </a>
                        <h1 class="text-3xl font-bold text-[#191d20] text-center ml-4">Carne al Fuego</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="registro_usuario.html" class="inline-flex items-center">
                        <img src="img/logo2.png" alt="Registrar Usuario" class="h-12 w-auto rounded-full border-2 border-[#ed2839]">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8 text-[#191d20] space-y-8">
        <!-- Formulario de Registro de Producto -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md p-6">
            <h2 class="text-2xl font-bold text-center p-4 bg-[#191d20] text-white">Registro de Nuevo Producto</h2>
            <form action="php/guardar_producto.php" method="post" enctype="multipart/form-data" class="p-4">
                <input type="hidden" name="categoria_id" value="<?php echo htmlspecialchars($categoria_id); ?>">
                
                <div class="mb-4">
                    <label for="nombre" class="block text-[#191d20] font-bold mb-2">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-[#191d20] font-bold mb-2">Descripción del Producto:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-[#191d20] font-bold mb-2">Precio del Producto:</label>
                    <input type="number" step="0.01" id="precio" name="precio" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-[#191d20] font-bold mb-2">Imagen del Producto:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="text-center">
                    <input type="submit" value="Registrar Producto" class="px-4 py-2 bg-[#ed2839] text-white rounded-lg cursor-pointer hover:bg-[#4A4A4A]">
                </div>
            </form>
        </div>

        <!-- Productos de la categoría -->
        <div class="bg-[#dfded9] rounded-lg overflow-hidden shadow-md p-6">
            <h3 class="text-xl font-bold text-center p-4 bg-[#ed2839] text-white">Productos en la Categoría</h3>
            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php
                if ($result_productos->num_rows > 0) {
                    while ($producto = $result_productos->fetch_assoc()) {
                        ?>
                        <div class="border rounded-lg p-4 bg-white shadow relative">
                            <h3 class="text-xl font-bold mb-2 text-[#191d20]"><?php echo $producto["nombre_producto"]; ?></h3>
                            <p class="text-[#404040] mb-2 break-words whitespace-normal"><?php echo $producto["descripcion_producto"]; ?></p>
                            <p class="text-[#191d20] font-bold mb-2">$<?php echo $producto["precio_producto"]; ?></p>
                            <img src="img/<?php echo basename($producto["imagen_producto"]); ?>" class="max-w-xs max-h-xs mb-4">
                            <div class="flex justify-between mt-4">
                                <!-- Botón Actualizar -->
                                <a href="php/actualizar_producto.php?id=<?php echo $producto["id"]; ?>&categoria_id=<?php echo $categoria_id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</a>
                                <!-- Botón Eliminar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-[#404040] text-center'>No hay productos en esta categoría.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <?php if (!empty($status)) { ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showAlert('<?php echo $status; ?>', '<?php echo strpos($status, "correctamente") !== false ? 'success' : 'error'; ?>');
            });
        </script>
    <?php } ?>
</body>
</html>
