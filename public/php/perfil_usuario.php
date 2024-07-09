<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: ../inicio_Secion.php');
    exit();
}

// Conectar a la base de datos
include 'conexion.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Usar el correo de la sesión para buscar los datos del usuario
$correo = $_SESSION['correo'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cedula = $row['cedula'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $telefono = $row['telefono'];
    $perfil = $row['perfil'];
} else {
    echo "No se encontraron datos para el usuario.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link href="../css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-center bg-cover" style="background-image: url('../img/fondo.jpg'); background-size: 40%; background-position: center;">

    <!-- Barra de navegación -->
    <nav class="bg-[#dfded9] shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="cliente_usuario.php">
                            <img class="h-12 w-auto rounded-full border-2 border-[#ed2839]" src="../img/logo.jpg" alt="Logo">
                        </a>
                        <h1 class="text-3xl font-bold text-[#191d20] text-center ml-4">Carne al Fuego</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="perfil_usuario.php" class="inline-flex items-center">
                        <img src="../img/logo2.png" alt="Registrar Usuario" class="h-12 w-auto rounded-full border-2 border-[#ed2839]">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido del perfil del usuario -->
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 text-[#191d20]">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-8 text-center bg-[#191d20] text-white p-4 rounded">Perfil del Usuario</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Cédula:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $cedula; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Nombre:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $firstName; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Apellido:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $lastName; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Email:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $email; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Teléfono:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $telefono; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Perfil:</p>
                    <p class="text-lg bg-gray-200 p-4 rounded"><?php echo $perfil; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
