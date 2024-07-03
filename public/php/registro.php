<?php
// Conexión a la base de datos
include 'conexion.php';

$status = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $perfil = $_POST['perfil'];

    // Verificar si el usuario ya existe
    $checkUserStmt = $conn->prepare('SELECT cedula FROM Usuarios WHERE cedula = ?');
    $checkUserStmt->bind_param('s', $cedula);
    $checkUserStmt->execute();
    $checkUserStmt->store_result();

    if ($checkUserStmt->num_rows > 0) {
        // El usuario ya está registrado, redirigir al formulario de registro con un mensaje de error en la URL
        header('Location: ../registro.html?error=Usuario ya registrado');
        exit;
    }

    $checkUserStmt->close();

    // Insertar nuevo usuario
    $stmt = $conn->prepare('INSERT INTO Usuarios (cedula, firstName, lastName, email, password, telefono, perfil) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssss', $cedula, $firstName, $lastName, $email, $password, $telefono, $perfil);

    if ($stmt->execute()) {
        // Registro exitoso
        $status = "Usuario registrado exitosamente";
    } else {
        // Error en el registro
        $status = "Error al registrar usuario";
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Redirigir con el mensaje de estado
header('Location: ../registro.html?status=' . urlencode($status));
exit;
?>

