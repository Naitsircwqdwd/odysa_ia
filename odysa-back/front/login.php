<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // El formulario manda "email"
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Buscar usuario en la tabla correcta
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $user["password"])) {

            // Guardar datos reales de tu tabla
            $_SESSION["usuario"] = $user["name"];     // o $user["email"]
            $_SESSION["email"]   = $user["email"];
            $_SESSION["id"]      = $user["id"];

            header("Location: dashboard.php");
            exit;

        } else {
            echo "❌ Contraseña incorrecta";
        }
    } else {
        echo "❌ Usuario no encontrado";
    }
}
?>
