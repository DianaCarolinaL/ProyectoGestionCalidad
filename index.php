<?php
	use \Core\App;

	// Ruta del proyecto
	define("PROJECTPATH", __DIR__);

	// Tipo de seprador de carpetas para cada SO
	define("DS", DIRECTORY_SEPARATOR);

	// Ruta de las vistas
	define("VIEWSPATH", PROJECTPATH . DS ."views");

	date_default_timezone_set("America/Bogota");

	// Inluimos el App.php
	include "core/app.php";

	// Obtenemos una instancia de App.php
	$instance = App::getInstance();

	// Lanzamos la aplicacion
	$instance->run();

?>
