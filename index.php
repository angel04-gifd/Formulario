<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="login.php" method="POST">
    <h2>Iniciar Sesión</h2>

    <button type="submit" name="rol" value="admin">
        Administrador
    </button>

    <button type="submit" name="rol" value="usuario">
        Usuario
    </button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

