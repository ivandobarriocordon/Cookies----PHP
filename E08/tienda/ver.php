<?php
$zona = $_COOKIE['zona'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie en tienda</title>
</head>
<body>
    <h1>Desde /tienda/</h1>
    <?php if ($zona !== null): ?>
        <p>La cookie zona existe y contiene: <?= htmlspecialchars($zona, ENT_QUOTES, 'UTF-8') ?>.</p>
    <?php else: ?>
        <p>La cookie zona no se recibe en esta ruta.</p>
    <?php endif; ?>
    <a href="crear.php">Volver a crear la cookie</a>
    <a href="../blog/ver.php">Probar desde /blog/</a>
</body>
</html>
