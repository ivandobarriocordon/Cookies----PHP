<?php
$colores = ['rojo', 'verde', 'azul'];
$color = $_COOKIE['color'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
	$colorElegido = $_POST['color'];

	if (in_array($colorElegido, $colores, true)) {
		setcookie('color', $colorElegido, time() + (7 * 24 * 60 * 60), '/');
		$color = $colorElegido;
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Elegir color</title>
</head>
<body style="background-color: <?= htmlspecialchars($color ?? 'white', ENT_QUOTES, 'UTF-8') ?>;">
	<h1>Elige un color</h1>

	<form method="post">
		<label for="color">Color:</label>
		<select name="color" id="color">
			<?php foreach ($colores as $opcion): ?>
				<option value="<?= $opcion ?>"<?= $color === $opcion ? ' selected' : '' ?>>
					<?= ucfirst($opcion) ?>
				</option>
			<?php endforeach; ?>
		</select>
		<button type="submit">Guardar color</button>
	</form>

	<?php if ($color !== null): ?>
		<p>Has elegido el color <?= htmlspecialchars($color, ENT_QUOTES, 'UTF-8') ?>.</p>
	<?php else: ?>
		<p>No has elegido ningún color todavía.</p>
	<?php endif; ?>
</body>
</html>
