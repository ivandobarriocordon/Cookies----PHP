<?php
$path = '/';

if (!isset($_COOKIE['preferencia']) && !isset($_GET['eliminada'])) {
	setcookie('preferencia', 'activada', time() + (7 * 86400), $path);
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
	setcookie('preferencia', '', time() - 3600, $path);
	header('Location: ' . $_SERVER['PHP_SELF'] . '?eliminada=1');
	exit;
}

$preferenciaExiste = isset($_COOKIE['preferencia']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar preferencia</title>
</head>
<body>
	<h1>Preferencia</h1>

	<?php if ($preferenciaExiste): ?>
		<p>La cookie preferencia existe.</p>
		<form method="post">
			<button type="submit" name="eliminar" value="1">Eliminar preferencia</button>
		</form>
	<?php else: ?>
		<p>La cookie preferencia ya no existe.</p>
	<?php endif; ?>
</body>
</html>
