<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Producto</title>
    <link href="./css/tailwind.css" rel="stylesheet"> <!-- Enlace a Tailwind CSS -->
    <script src="./js/registro_producto.js"></script>
    <script defer src="./js/color.js"></script>
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
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-md bg-white  rounded-lg overflow-hidden shadow-md mx-auto">
            <h2 class="text-2xl font-bold text-center p-4 bg-[#191d20] text-white">Registro de Nuevo Producto</h2>

            <div id="mensaje" class="p-4 bg-[#dfded9] border-b border-gray-200"></div> <!-- Aquí se mostrará el mensaje del servidor -->

            <form action="#" method="post" id="registroForm" enctype="multipart/form-data" onsubmit="return validarFormulario()" class="p-4">
                <div class="mb-4">
                    <label for="nombre" class="block text-[#191d20] font-bold mb-2">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required class="w-full px-3 py-2 border  rounded-lg  text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-[#191d20] font-bold mb-2">Descripción del Producto:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required class="w-full px-3 py-2 border rounded-lg  text-[#2E2E2E] focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-[#191d20] font-bold mb-2">Precio del Producto:</label>
                    <input type="number" step="0.01" id="precio" name="precio" required class="w-full px-3 py-2 border rounded-lg  text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-[#191d20] font-bold mb-2">Imagen del Producto:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required class="w-full px-3 py-2 border  rounded-lg  text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="text-center">
                    <input type="submit" value="Registrar Producto" class="px-4 py-2 bg-[#ed2839] text-white rounded-lg cursor-pointer hover:bg-[#4A4A4A]">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
