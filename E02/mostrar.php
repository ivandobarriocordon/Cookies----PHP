<?php
if (isset($_COOKIE['nombre'], $_COOKIE['curso'])) {
	echo $_COOKIE['nombre'] . ' estudia ' . $_COOKIE['curso'] . '.';
} else {
	echo 'Las cookies todavía no existen.';
}
?>
