<?php
session_start();
if ($_SESSION['rol'] !== "admin") {
    header("Location: login.php");
    exit;
}

require "conexion.php";

$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Administrador</title>
<link rel="stylesheet" href="admin.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="sidebar">
    
  <p><?= htmlspecialchars($_SESSION['usuario']) ?></p>

  <p><?= htmlspecialchars($_SESSION['rol']) ?></p>


    
    <a href="logout.php" class="logout">Cerrar Sesión</a>
</div>

<div class="content">
    <center> <h1>Usuarios Registrados</h1> </center>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u['nombre'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['telefono'] ?></td>
            <td><?= $u['fecha_registro'] ?></td>
            <td><?= $u['rol'] ?></td>
            <td>
                <a href="editar_usuario.php?id=<?= $u['id'] ?>" class="btn edit">Editar</a>
                <button class="btn delete" onclick="eliminar(<?= $u['id'] ?>)">Eliminar</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<script>
function eliminar(id) {
    Swal.fire({
        title: '¿Eliminar usuario?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'eliminar_usuario.php?id=' + id;
        }
    });
}
</script>

</body>
</html>
