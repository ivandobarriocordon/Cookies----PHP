<?php
setcookie(
	'identificador',
	'usuario-ejemplo',
	time() + 3600,
	'/',
	'',
	true,
	true
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cookie segura</title>
</head>
<body>
	<h1>Cookie identificador</h1>
	<p>La cookie se ha configurado para durar una hora.</p>

	<h2>¿Qué hace secure?</h2>
	<p>
		<code>secure=true</code> indica que el navegador solo debe enviar la
		cookie mediante una conexión HTTPS cifrada.
	</p>

	<h2>¿Qué hace httponly?</h2>
	<p>
		<code>httponly=true</code> impide que JavaScript acceda a la cookie
		mediante <code>document.cookie</code>. El navegador sí puede enviarla
		al servidor en las peticiones HTTP o HTTPS que correspondan.
	</p>

	<h2>Servidor local sin HTTPS</h2>
	<p>
		En un servidor local que funciona con <code>http://</code>, una cookie
		con <code>secure=true</code> no se enviará en las peticiones. Por eso
		puede parecer que no funciona hasta configurar HTTPS.
	</p>
</body>
</html>
