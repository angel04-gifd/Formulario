<?php
session_start();

/* Si viene de admin */
if (isset($_POST['rol'])) {
    $_SESSION['rol_intento'] = $_POST['rol'];
}
?>
<link rel="stylesheet" href="style.css">
<form action="validar_login.php" method="POST">
    <h2>Iniciar Sesión</h2>

    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>

    <button type="submit">Entrar</button>

<p class="registro-link">
    ¿No tienes cuenta?
    <a href="registro.html">Registrar una cuenta</a>
</p>

</form>
