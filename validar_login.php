<?php
session_start();
require_once "conexion.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

try {
    $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $usuario['password'])) {

            // VALIDAR ADMIN POR CORREO
            if ($usuario['rol'] === "admin") {

                if (!str_ends_with($email, "@admin.com")) {
                    echo "<script>
                        alert('Acceso denegado: correo no autorizado como administrador');
                        window.location='login.php';
                    </script>";
                    exit;
                }

                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['rol'] = "admin";
                header("Location: admin.php");
                exit;

            } else {

                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['rol'] = "usuario";
                header("Location: usuario.php");
                exit;
            }

        } else {
            echo "<script>
                alert('Contraseña incorrecta');
                window.location='login.php';
            </script>";
        }

    } else {
        echo "<script>
            alert('El usuario no existe');
            window.location='login.php';
        </script>";
    }

} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "<script>
        alert('Error del servidor');
        window.location='login.php';
    </script>";
}
