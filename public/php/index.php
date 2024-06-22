<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comidas</title>
    <!-- Incluir Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <!-- Barra de navegación -->
    <nav class="bg-black shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img class="h-12 w-auto" src="../img/logo.jpg" alt="Logo">
                    <a href="#" class="ml-4 text-sm font-medium text-gray-300 hover:text-gray-100">Inicio</a>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <!-- Desplegable de Registrar -->
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium text-gray-300 hover:text-gray-100 focus:outline-none focus:text-gray-100">
                            Registrar
                            <!-- Icono de flecha abajo -->
                            <svg class="ml-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 12l-6-6H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-1l-6-6zm-6-8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2h-8a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Menú desplegable -->
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <div class="py-1" role="none">
                                <a href="../registro_categoria.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Registrar Categoría</a>
                                <a href="registro_plato.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Registrar Plato</a>
                                <a href="registro_empleado.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Registrar Empleado</a>
                            </div>
                        </div>
                    </div>
                    <a href="ver_categorias.php" class="ml-4 text-sm font-medium text-gray-300 hover:text-gray-100">Ver Categorías</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-gray-900 border-b border-gray-600">
                <div>
                    <h2 class="text-3xl font-bold">Bienvenido a la Gestión de Comidas</h2>
                    <p class="mt-2 text-sm text-gray-300">Aquí puedes administrar categorías, platos y empleados de tu restaurante.</p>
                </div>
            </div>

            <!-- Más contenido aquí según sea necesario -->
        </div>
    </div>
</body>

</html>
