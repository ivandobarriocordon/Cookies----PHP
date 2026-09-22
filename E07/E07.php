<?php
$path = '/';
$caducidad = time() + (7 * 86400);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['nombre'])) {
		$nombre = trim($_POST['nombre']);

		if ($nombre !== '') {
			setcookie('nombre', $nombre, $caducidad, $path);
			header('Location: ' . $_SERVER['PHP_SELF']);
			exit;
		}
	}

	if (isset($_POST['olvidar'])) {
		setcookie('nombre', '', time() - 3600, $path);
		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}
}

$nombreGuardado = $_COOKIE['nombre'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bienvenida</title>
</head>
<body>
	<?php if ($nombreGuardado === null): ?>
		<h1>Te damos la bienvenida</h1>
		<form method="post">
			<label for="nombre">¿Cómo te llamas?</label>
			<input type="text" name="nombre" id="nombre" required>
			<button type="submit">Guardar nombre</button>
		</form>
	<?php else: ?>
		<h1>Bienvenido de nuevo, <?= htmlspecialchars($nombreGuardado, ENT_QUOTES, 'UTF-8') ?>.</h1>
		<form method="post">
			<button type="submit" name="olvidar" value="1">Olvidar mi nombre</button>
		</form>
	<?php endif; ?>
</body>
</html>
