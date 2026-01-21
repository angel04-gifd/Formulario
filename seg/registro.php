<?php
header("Content-Type: application/json");

// No mostrar errores técnicos
ini_set('display_errors', 0);
error_reporting(0);

// Leer JSON
$data = json_decode(file_get_contents("php://input"), true);

// Sanitización
$nombre = trim($data['nombre'] ?? '');
$email = filter_var($data['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $data['password'] ?? '';
$telefono = preg_replace('/[^0-9]/', '', $data['telefono'] ?? '');

// Validaciones backend
if (strlen($nombre) < 3) {
    echo json_encode(["message" => "Datos inválidos"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Datos inválidos"]);
    exit;
}

if (strlen($password) < 8) {
    echo json_encode(["message" => "Datos inválidos"]);
    exit;
}

if (strlen($telefono) !== 10) {
    echo json_encode(["message" => "Datos inválidos"]);
    exit;
}

// Encriptar contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Conexión segura
require "conexion.php";

try {
    $stmt = $pdo->prepare("
        INSERT INTO usuarios (nombre, email, password, telefono)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([$nombre, $email, $passwordHash, $telefono]);

    echo json_encode(["message" => "Registro exitoso"]);
} catch (Exception $e) {
    // Registrar error real (opcional)
    error_log($e->getMessage());
    echo json_encode(["message" => "No se pudo completar el registro"]);
}
