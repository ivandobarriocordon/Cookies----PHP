<?php
$caducidad = time() + (7 * 86400);
$temas = ['light', 'dark'];

if (!isset($_COOKIE['tema'])) {
	setcookie('tema', 'light', $caducidad, '/');
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

if (isset($_GET['tema']) && in_array($_GET['tema'], $temas, true)) {
	setcookie('tema', $_GET['tema'], $caducidad, '/');
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

$temaActual = $_COOKIE['tema'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cambiar tema</title>
</head>
<body>
	<h1>Configuración del tema</h1>
	<p>Tema actual: <?= htmlspecialchars($temaActual, ENT_QUOTES, 'UTF-8') ?></p>
	<a href="?tema=light">Cambiar a claro</a>
	<a href="?tema=dark">Cambiar a oscuro</a>
</body>
</html>
