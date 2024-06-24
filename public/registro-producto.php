<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Producto</title>
    <link href="./css/tailwind.css" rel="stylesheet"> <!-- Enlace a Tailwind CSS -->
    <script src="./js/registro_producto.js"></script>
</head>
<body class="bg-[#2E2E2E] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-[#4A4A4A] text-white rounded-lg overflow-hidden shadow-md">
        <h2 class="text-2xl font-bold text-center p-4 bg-[#B0B0B0] text-[#2E2E2E]">Registro de Nuevo Producto</h2>

        <div id="mensaje"></div> <!-- Aquí se mostrará el mensaje del servidor -->

        <form action="#" method="post" id="registroForm" enctype="multipart/form-data" onsubmit="return validarFormulario()" class="p-4">
            <div class="mb-4">
                <label for="nombre" class="block text-white font-bold mb-2">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required class="w-full px-3 py-2 border border-gray-500 rounded-lg bg-[#B0B0B0] text-[#2E2E2E] focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-white font-bold mb-2">Descripción del Producto:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required class="w-full px-3 py-2 border border-gray-500 rounded-lg bg-[#B0B0B0] text-[#2E2E2E] focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="precio" class="block text-white font-bold mb-2">Precio del Producto:</label>
                <input type="number" step="0.01" id="precio" name="precio" required class="w-full px-3 py-2 border border-gray-500 rounded-lg bg-[#B0B0B0] text-[#2E2E2E] focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="imagen" class="block text-white font-bold mb-2">Imagen del Producto:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required class="w-full px-3 py-2 border border-gray-500 rounded-lg bg-[#B0B0B0] text-[#2E2E2E] focus:outline-none focus:border-blue-500">
            </div>

            <div class="text-center">
                <input type="submit" value="Registrar Producto" class="px-4 py-2 bg-[#2E2E2E] text-white rounded-lg cursor-pointer hover:bg-[#4A4A4A]">
            </div>
        </form>
    </div>
</body>
</html>
