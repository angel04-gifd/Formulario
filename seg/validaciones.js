document.getElementById("registerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const password2 = document.getElementById("password2").value;
    const telefono = document.getElementById("telefono").value.trim();

    // VALIDACIONES FRONTEND CON MODAL
    if (nombre.length < 3) {
        Swal.fire("Error", "El nombre debe tener al menos 3 caracteres", "error");
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        Swal.fire("Correo inválido", "Ingresa un correo electrónico válido", "warning");
        return;
    }

    if (password.length < 8) {
        Swal.fire("Contraseña débil", "La contraseña debe tener mínimo 8 caracteres", "warning");
        return;
    }

    if (password !== password2) {
        Swal.fire("Error", "Las contraseñas no coinciden", "error");
        return;
    }

    const telRegex = /^[0-9]{10}$/;
    if (!telRegex.test(telefono)) {
        Swal.fire(
            "Teléfono inválido",
            "El número de teléfono debe contener 10 dígitos",
            "warning"
        );
        return;
    }

    // ENVÍO AL BACKEND
    fetch("registro.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nombre, email, password, telefono })
    })
    .then(res => res.json())
    .then(data => {
        if (data.message === "Registro exitoso") {
            Swal.fire({
                icon: "success",
                title: "Registro exitoso",
                text: "El usuario fue registrado correctamente",
                confirmButtonText: "Aceptar"
            });

            document.getElementById("registerForm").reset();
        } else {
            Swal.fire("Aviso", data.message, "info");
        }
    })
    .catch(() => {
        Swal.fire(
            "Error del servidor",
            "No se pudo conectar con el servidor",
            "error"
        );
    });
});
