<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comidas</title>
    <!-- Incluir Tailwind CSS -->
    <link rel="stylesheet" href="./css/tailwind.css"> <!-- Enlace correcto a Tailwind CSS -->
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-[#dfded9] shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-12 w-auto rounded-full border-2 border-[#ed2839]" src="../img/logo.jpg" alt="Logo">
                    </div>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <!-- Opciones del menú -->
                        <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-[#191d20] hover:text-[#ed2839] hover:border-[#ed2839] focus:outline-none focus:text-[#ed2839] focus:border-[#ed2839]">
                            Inicio
                        </a>
                        <div class="relative">
                            <!-- Desplegable de Registrar -->
                            <button type="button" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-[#191d20] hover:text-[#ed2839] hover:border-[#ed2839] focus:outline-none focus:text-[#ed2839] focus:border-[#ed2839]">
                                Registrar
                                <!-- Icono de flecha abajo -->
                                <svg class="ml-1 h-5 w-5 text-[#191d20]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 12l-6-6H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-1l-6-6zm-6-8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2h-8a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Menú desplegable -->

                        <a href="./php/ver_categorias.php" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-[#191d20] hover:text-[#ed2839] hover:border-[#ed2839] focus:outline-none focus:text-[#ed2839] focus:border-[#ed2839]">
                            Ver Categorías
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-[#dfded9] border-b border-gray-200">
                <div>
                    <h2 class="text-4xl font-bold text-[#191d20]">Bienvenido a la Gestión de Comidas</h2>
                    <p class="mt-4 text-lg text-[#404040]">Aquí puedes administrar categorías, platos y empleados de tu restaurante.</p>
                </div>
            </div>

            <!-- Más contenido aquí según sea necesario -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tarjeta de Registrar Categoría -->
                    <a href="../registro_categoria.html" class="block bg-[#dfded9] hover:bg-[#ed2839] text-[#191d20] hover:text-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Registrar Categoría</h3>
                        <p class="mt-2">Añade nuevas categorías a tu restaurante.</p>
                    </a>
                    <!-- Tarjeta de Registrar Plato -->
                    <a href="registro_plato.html" class="block bg-[#dfded9] hover:bg-[#ed2839] text-[#191d20] hover:text-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Registrar Plato</h3>
                        <p class="mt-2">Añade nuevos platos al menú.</p>
                    </a>
                    <!-- Tarjeta de Registrar Empleado -->
                    <a href="registro_empleado.html" class="block bg-[#dfded9] hover:bg-[#ed2839] text-[#191d20] hover:text-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Registrar Empleado</h3>
                        <p class="mt-2">Añade nuevos empleados al equipo.</p>
                    </a>
                    <!-- Tarjeta de Ver Categorías -->
                    <a href="./php/ver_categorias.php" class="block bg-[#dfded9] hover:bg-[#ed2839] text-[#191d20] hover:text-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <h3 class="text-xl font-bold">Ver Categorías</h3>
                        <p class="mt-2">Consulta las categorías registradas.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
