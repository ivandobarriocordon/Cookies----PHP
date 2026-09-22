<?php
$caducidad = time() + (86400 * 30);

setcookie('idioma', 'es', $caducidad, '/');

echo 'La cookie idioma permanecerá activa aproximadamente hasta el '
	. date('d/m/Y H:i:s', $caducidad) . '.';
?>
