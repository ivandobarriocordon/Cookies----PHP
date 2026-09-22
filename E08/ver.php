<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Prueba del path de una cookie</title>
</head>
<body>
	<h1>Prueba del path de una cookie</h1>
	<p>Empieza creando la cookie desde la tienda:</p>
	<a href="tienda/crear.php">Abrir tienda/crear.php</a>

	<h2>Conclusión</h2>
	<p>
		Con el path <code>/tienda/</code>, el navegador solo envía la cookie a
		páginas dentro de esa carpeta. Con el path <code>/</code>, la envía a
		todas las rutas del sitio, incluida <code>/blog/</code>.
	</p>
</body>
</html>
