<?php
	namespace App\Controller;

	require PROJECTPATH . DS .'app'. DS .'models'. DS .'admin.php';

	use \Core\View;
	use \App\Models\Admin;


	/**
	 * Controlador para gestionar la autentificacion de los administradores del sistema
	 */
	class Auth	{

		/**
		* Metodo que se ejecuta por defecto cuando no se especifica ningun metodo
		* [Redirect] Redirecciona a la vista de login, solo si, la sesion esta iniciada
		* de lo contrario volvera al inicio
		*/
		function index() {
			if (!isset($_SESSION['admin'])) {
				View::render("admin" . DS . "login");
			}else {
				header("Location: ../contenido/principal/");
			}
		}

		/**
		* Metodo que valida la autentificacion de los administradores
		* [Redirect] Redirecciona al panel de administracion de ser validas las credenciales o
		* al login de ser incorrectas
		*/
		function validate() {
			$email = htmlspecialchars($_POST['email']);
			$ad = Admin::auth($email);
			$pass = $_POST['pass'];
			if (password_verify($pass, $ad['contrasenia'])) {
				$_SESSION['admin'] = $ad;
				header("Location: ../../contenido/principal/");
			}else {
				header("Location: ../../login/");
			}

		}

		/**
		 *  Metodo utilizado para cerrar la sesion del administrador
		 * [Redirect] Redirecciona a la vista principal del usuario final
		 */
		function cerrarSesion() {
			// Destruimos la cookie de sesión si existe
		    if(isset($_COOKIE[session_name()])) {
		        setcookie(session_name(),'',-4200,'/');
		    }
		    session_unset();    // Destruimos las variables de sesión
		    session_destroy();	// Destruimos finalmente la información de la sesión
		  	header("Location: ../../");
		}
	}
?>
