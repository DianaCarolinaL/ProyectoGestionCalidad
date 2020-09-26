<?php  

	namespace App\Controller;

	use \App\Models\DTO\Formacion as FormDTO;
	use \App\Models\FormacionDAO as FormDAO;

	/**
	*  Clase controladora para la gestion de la formacion del docente
	*/
	class Formacion {


		/**
		 *  Metodo que recibe lo datos de la vista y los envia al DAO
		 */
		function register() {
			$id_doc = htmlspecialchars($_POST['id_doc']);
			$titulo = htmlspecialchars($_POST['titulo']);
			$fechaini = htmlspecialchars($_POST['fechaini']);
			$lugar = htmlspecialchars($_POST['lugar']);
			$fechafin = htmlspecialchars($_POST['fechafin']);
			$tesis = htmlspecialchars($_POST['tesis']);
			if (!empty($id_doc) and !empty($titulo) and !empty($fechaini) and !empty($lugar) and !empty($tesis)) {
				$est = new FormDTO($titulo, $fechaini, $fechafin, $tesis, $lugar, $id_doc);
				$json = FormDAO::insert($est);
			}
			else {
				$json = ['ok' => false, 'error' => 'Faltan datos por ingresar'];
			}
			print(json_encode($json));
		}
		

		/**
		 *  Metodo que recibe y envia los datos de la formacion al DAO para actualizar
		 */
		function update() {
			$id = htmlspecialchars($_POST['id_est']);
			$id_doc = htmlspecialchars($_POST['id_doc']);
			$titulo = htmlspecialchars($_POST['titulo']);
			$fechaini = htmlspecialchars($_POST['fechaini']);
			$lugar = htmlspecialchars($_POST['lugar']);
			$fechafin = htmlspecialchars($_POST['fechafin']);
			$tesis = htmlspecialchars($_POST['tesis']);
			$json;
			if (!empty($id) and !empty($titulo) and !empty($fechaini) and !empty($lugar) and !empty($tesis)) {

				$est = new FormDTO($titulo, $fechaini, $fechafin, $tesis, $lugar, $id_doc);
				$json = FormDAO::update($est, $id);
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
				$json = FormDAO::delete($id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Falta el identificador'];
			}

			print(json_encode($json));
		}

		
	}

?>