<?php
session_start();
require "conexion.php";

/* PROTECCIÓN: solo admin */
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}

/* VALIDAR ID */
if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = $_GET['id'];

/* OBTENER USUARIO */
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$u) {
    header("Location: admin.php");
    exit;
}

/* FLAGS */
$success = false;
$error = "";

/* ACTUALIZAR USUARIO */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre   = trim($_POST['nombre']);
    $email    = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);

    if (empty($nombre) || empty($email) || empty($telefono)) {
        $error = "Todos los campos son obligatorios";
    } else {

        $sql = "UPDATE usuarios 
                SET nombre = ?, email = ?, telefono = ?
                WHERE id = ?";

        $update = $pdo->prepare($sql);
        $update->execute([$nombre, $email, $telefono, $id]);

        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST" class="form">
    <h2>Editar Usuario</h2>

    <input type="text" name="nombre"
           value="<?= htmlspecialchars($u['nombre']) ?>" required>

    <input type="email" name="email"
           value="<?= htmlspecialchars($u['email']) ?>" required>

    <input type="text" name="telefono"
           value="<?= htmlspecialchars($u['telefono']) ?>" required>

    <button type="submit">Actualizar</button>
</form>

<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (!empty($error)): ?>
<script>
Swal.fire({
    icon: "error",
    title: "Error",
    text: "<?= $error ?>"
});
</script>
<?php endif; ?>

<?php if ($success): ?>
<script>
Swal.fire({
    icon: "success",
    title: "Actualizado",
    text: "Usuario actualizado correctamente",
    confirmButtonText: "OK"
}).then(() => {
    window.location.href = "admin.php";
});
</script>
<?php endif; ?>

</body>
</html>
