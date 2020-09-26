<?php

	namespace App\Models;

	use \Core\Database as DB;


	/**
	*  Clase DAO que gestiona el acceso a la DB para el personal
	*/
	class Personal {


		/**
		 *  Metodo que obtiene todos los registros del personal contenido en la DB
		 *  @return array con los registros obtenidos
		 */
		public static function select() {
			try {

				$conn = DB::instance();
				$query = "SELECT * FROM personal";
				$res = $conn->prepare($query);
				$res->execute();
				$conn->close();
				return $res->fetchAll();

			} catch (\PDOException $e) {
				return null;
			}
		}

		/**
		 *  Metodo que guarda en la DB la informacion de un integrante del personal
		 */
		public static function insert($per) {
			try {

				$conn = DB::instance();
				$query = "INSERT INTO personal(identificacion,nombre,apellidos,telefono,email,cargo,dir_laboral,competencias,url_cvlac,imagen) VALUES(?,?,?,?,?,?,?,?,?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $per->getId(), \PDO::PARAM_INT);
				$res->bindValue(2, $per->getNombre(), \PDO::PARAM_STR);
				$res->bindValue(3, $per->getApellidos(), \PDO::PARAM_STR);
				$res->bindValue(4, $per->getTelefono(), \PDO::PARAM_STR);
				$res->bindValue(5, $per->getEmail(), \PDO::PARAM_STR);
				$res->bindValue(6, $per->getCargo(), \PDO::PARAM_STR);
				$res->bindValue(7, $per->getDirLaboral(), \PDO::PARAM_STR);
				$res->bindValue(8, $per->getCompetencias(), \PDO::PARAM_STR);
				$res->bindValue(9, $per->getUrl(), \PDO::PARAM_STR);
				$res->bindValue(10, $per->getImg(), \PDO::PARAM_STR);
				$res->execute();
				$conn->close();
				return ['ok' => true];

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => 'Error:!' . $e->getMessage()];
			}
		}

		/**
		 *  Metodo que elimina de la DB un docente
		 *  @var $id Identificador de cada integrante en la DB
		 *  @return array con la info de la transaccion
		 */
		public static function delete($id) {
			try {

				$conn = DB::instance();
				$query = "DELETE p, f, pr FROM personal p LEFT JOIN formacion f ON f.id = p.id LEFT JOIN proyectos pr ON pr.id_docente = p.id WHERE p.id = ?";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => 'Error:!' . $e->getMessage()];
			}
		}

		/**
		 * Metodo que obtiene la informacion de la DB para un integrante dado
		 */
		public static function find($id) {
			try {

				$conn = DB::instance();
				$query = "SELECT * FROM personal WHERE id = ? or identificacion = ?";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->bindParam(2, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return $res->fetchAll();

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => 'Error:!' . $e->getMessage()];
			}
		}

		/**
		 * Metodo que actualiza la informacion de la DB para un integrante dado
		 */
		public static function update($obj, $id_old) {
			try {
				$conn = DB::instance();
				$query = "UPDATE personal SET identificacion = ?, nombre = ?, apellidos = ?, telefono = ?, email = ?, cargo = ?, imagen = ?, dir_laboral = ?, competencias = ?, url_cvlac = ? WHERE id = ?";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getId(), \PDO::PARAM_INT);
				$res->bindValue(2, $obj->getNombre(), \PDO::PARAM_STR);
				$res->bindValue(3, $obj->getApellidos(), \PDO::PARAM_STR);
				$res->bindValue(4, $obj->getTelefono(), \PDO::PARAM_STR);
				$res->bindValue(5, $obj->getEmail(), \PDO::PARAM_STR);
				$res->bindValue(6, $obj->getCargo(), \PDO::PARAM_STR);
				$res->bindValue(7, $obj->getImg(), \PDO::PARAM_STR);
				$res->bindValue(8, $obj->getDirLaboral(), \PDO::PARAM_STR);
				$res->bindValue(9, $obj->getCompetencias(), \PDO::PARAM_STR);
				$res->bindValue(10, $obj->getUrl(), \PDO::PARAM_STR);
				$res->bindValue(11, $id_old, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => $e->getMessage()];
			}
		}
	}

?>
