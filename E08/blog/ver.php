<?php
$zona = $_COOKIE['zona'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie en blog</title>
</head>
<body>
    <h1>Desde /blog/</h1>
    <?php if ($zona !== null): ?>
        <p>La cookie zona existe y contiene: <?= htmlspecialchars($zona, ENT_QUOTES, 'UTF-8') ?>.</p>
    <?php else: ?>
        <p>La cookie zona no se recibe en esta ruta.</p>
    <?php endif; ?>
    <a href="../tienda/crear.php">Volver a crear la cookie</a>
    <a href="../tienda/ver.php">Probar desde /tienda/</a>
</body>
</html>
