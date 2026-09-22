<?php
$path = '/';
$duracion = 30 * 86400;
$temas = ['light', 'dark'];
$idiomas = ['es', 'eu', 'en'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['restablecer'])) {
		$fechaPasada = time() - 3600;
		setcookie('tema', '', $fechaPasada, $path);
		setcookie('idioma', '', $fechaPasada, $path);
		setcookie('nombre', '', $fechaPasada, $path);
		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}

	$tema = $_POST['tema'] ?? 'light';
	$idioma = $_POST['idioma'] ?? 'es';
	$nombre = trim($_POST['nombre'] ?? '');

	if (!in_array($tema, $temas, true)) {
		$tema = 'light';
	}

	if (!in_array($idioma, $idiomas, true)) {
		$idioma = 'es';
	}

	$caducidad = time() + $duracion;
	setcookie('tema', $tema, $caducidad, $path);
	setcookie('idioma', $idioma, $caducidad, $path);
	setcookie('nombre', $nombre, $caducidad, $path);
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

$tema = $_COOKIE['tema'] ?? 'light';
$idioma = $_COOKIE['idioma'] ?? 'es';
$nombre = $_COOKIE['nombre'] ?? '';

if (!in_array($tema, $temas, true)) {
	$tema = 'light';
}

if (!in_array($idioma, $idiomas, true)) {
	$idioma = 'es';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Preferencias</title>
	<style>
		:root {
			font-family: Arial, sans-serif;
		}

		body {
			margin: 0;
			padding: 2rem;
			background: #f4f4f4;
			color: #222;
		}

		body.dark {
			background: #202124;
			color: #f5f5f5;
		}

		main {
			max-width: 32rem;
			margin: 0 auto;
			padding: 2rem;
			background: white;
			border: 1px solid #ccc;
		}

		body.dark main {
			background: #303134;
			border-color: #666;
		}

		label,
		input,
		select,
		button {
			display: block;
			margin-top: 0.5rem;
		}

		label {
			margin-top: 1rem;
		}

		input,
		select,
		button {
			padding: 0.5rem;
		}
	</style>
</head>
<body class="<?= htmlspecialchars($tema, ENT_QUOTES, 'UTF-8') ?>">
	<main>
		<h1>Preferencias</h1>

		<form method="post">
			<label for="tema">Tema visual</label>
			<select name="tema" id="tema">
				<option value="light"<?= $tema === 'light' ? ' selected' : '' ?>>Claro</option>
				<option value="dark"<?= $tema === 'dark' ? ' selected' : '' ?>>Oscuro</option>
			</select>

			<label for="idioma">Idioma</label>
			<select name="idioma" id="idioma">
				<?php foreach ($idiomas as $opcion): ?>
					<option value="<?= $opcion ?>"<?= $idioma === $opcion ? ' selected' : '' ?>>
						<?= strtoupper($opcion) ?>
					</option>
				<?php endforeach; ?>
			</select>

			<label for="nombre">Nombre visible</label>
			<input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>">

			<button type="submit">Guardar preferencias</button>
		</form>

		<form method="post">
			<button type="submit" name="restablecer" value="1">Restablecer preferencias</button>
		</form>

		<?php if ($nombre !== ''): ?>
			<p>Nombre visible: <?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></p>
		<?php endif; ?>
		<p>Tema: <?= htmlspecialchars($tema, ENT_QUOTES, 'UTF-8') ?></p>
		<p>Idioma: <?= htmlspecialchars($idioma, ENT_QUOTES, 'UTF-8') ?></p>
	</main>
</body>
</html>
