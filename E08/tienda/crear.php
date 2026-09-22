<?php
$paths = ['/tienda/', '/'];
$path = $_GET['path'] ?? '/tienda/';

if (!in_array($path, $paths, true)) {
    $path = '/tienda/';
}

$pathAnterior = $path === '/' ? '/tienda/' : '/';
setcookie('zona', '', time() - 3600, $pathAnterior);
setcookie('zona', 'tienda', time() + 3600, $path);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear cookie</title>
</head>
<body>
    <h1>Crear cookie desde tienda</h1>
    <p>Cookie <strong>zona</strong> creada con el path <code><?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?></code>.</p>
    <p>Abre las páginas de prueba después de crearla:</p>
    <ul>
        <li><a href="ver.php">Ver desde /tienda/</a></li>
        <li><a href="../blog/ver.php">Ver desde /blog/</a></li>
    </ul>
    <p>Cambia el path para repetir la prueba:</p>
    <a href="?path=%2Ftienda%2F">Crear con /tienda/</a>
    <a href="?path=%2F">Crear con /</a>
</body>
</html>
