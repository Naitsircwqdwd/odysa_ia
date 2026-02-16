<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<p style="color:red; font-size:40px;">TEST CSS</p>

    <div class="sidebar">
        <h2 class="logo">Mi App</h2>
        <ul>
            <li class="active">🏠 Inicio</li>
            <li>📁 Archivos</li>
            <li>⚙️ Ajustes</li>
            <li>❓ Ayuda</li>
        </ul>

        <a href="logout.php" class="logout">Cerrar sesión</a>
    </div>

    <div class="main">
        <h1>Bienvenido, <?php echo $usuario; ?> 👋</h1>

        <div class="cards">
            <div class="card">
                <h3>Usuarios activos</h3>
                <p>128</p>
            </div>

            <div class="card">
                <h3>Tareas completadas</h3>
                <p>54</p>
            </div>

            <div class="card">
                <h3>Nuevos mensajes</h3>
                <p>12</p>
            </div>
        </div>

    </div>

</body>
</html>
