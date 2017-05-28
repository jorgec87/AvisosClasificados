<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
   if (isset($_SESSION['id_usuario'])) {
		// Direccion a la pagina de inicio
		header('Location: ../index.php');
		// Fin redireccionamiento
	}
?>