<?php  

	namespace App\Controller;

	use \App\Models\DTO\Proyectos as ProyDTO;
	use \App\Models\ProyectosDAO as ProyDAO;

	/**
	*  Clase controladora para la gestion de los proyectos realizados por el docente
	*/
	class Proyectos {


		/**
		 *  Metodo que recibe lo datos de la vista y los envia al DAO
		 */
		function register() {
			$id_doc = htmlspecialchars($_POST['id_doc']);
			$titulo = htmlspecialchars($_POST['titulo']);
			$fecha = htmlspecialchars($_POST['fecha']);
			$lugar = htmlspecialchars($_POST['lugar']);
			if (!empty($id_doc) and !empty($titulo) and !empty($fecha) and !empty($lugar)) {
				$est = new ProyDTO($titulo, $lugar, $fecha, $id_doc);
				$json = ProyDAO::insert($est);
			}
			else {
				$json = ['ok' => false, 'error' => 'Faltan datos'];
			}
			print(json_encode($json));
		}
		

		/**
		 *  Metodo que recibe y envia los datos de la formacion al DAO para actualizar
		 */
		function update() {
			$id = htmlspecialchars($_POST['id_proy']);
			$id_doc = htmlspecialchars($_POST['id_doc']);
			$titulo = htmlspecialchars($_POST['titulo']);
			$fecha = htmlspecialchars($_POST['fecha']);
			$lugar = htmlspecialchars($_POST['lugar']);
			$json;
			if (!empty($id) and !empty($titulo) and !empty($lugar) and !empty($fecha)) {

				$est = new ProyDTO($titulo, $lugar, $fecha, $id_doc);
				$json = ProyDAO::update($est, $id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Faltan datos por ingresar'];
			}
			print(json_encode($json));
		}

		/**
		 *  Metodo que recibe el id de la formaciona a eliminar y la envia al DAO
		 */
		function delete() {
			$id = htmlspecialchars($_POST['id']);
			if (!empty($id)) {
				$json = ProyDAO::delete($id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Falta el identificador'];
			}

			print(json_encode($json));
		}

		
	}

?>