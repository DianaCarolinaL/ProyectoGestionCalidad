<?php  

	namespace App\Models;

	use \Core\Database as DB;


	/**
	*  Clase DAO para el gestion de la informacion de la formacion academica de un docente en la DB 
	*/
	class FormacionDAO {
		
		public static function insert($obj) {
			try {
				$conn = DB::instance();
				$query = "INSERT INTO formacion(titulo,fecha_inicio,fecha_fin,tesis,lugar,id_personal) VALUES(?,?,?,?,?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getTitulo(), \PDO::PARAM_STR);
				$res->bindValue(2, $obj->getFechaIni(), \PDO::PARAM_STR);
				$res->bindValue(3, $obj->getFechaFin(), \PDO::PARAM_STR);
				$res->bindValue(4, $obj->getTesis(), \PDO::PARAM_STR);
				$res->bindValue(5, $obj->getLugar(), \PDO::PARAM_STR);
				$res->bindValue(6, $obj->getIdDoc(), \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];
				
			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => $e->getMessage(). "-> id-> ".$obj->getIdDoc()];
			}
		}

		public static function find($id) {
			try {

				$conn = DB::instance();
				$query = "SELECT * FROM formacion WHERE id_personal = ? ORDER BY id DESC";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return json_encode($res->fetchAll());
				
			} catch (\PDOException $e) {
				return null;
			}
		}

		public static function update($obj, $id) {
			try {
				$conn = DB::instance();
				$query = "UPDATE formacion SET titulo = ?, fecha_inicio = ?, fecha_fin = ?, tesis = ?, lugar = ? WHERE id = ?";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getTitulo(), \PDO::PARAM_STR);
				$res->bindValue(2, $obj->getFechaIni(), \PDO::PARAM_STR);
				$res->bindValue(3, $obj->getFechaFin(), \PDO::PARAM_STR);
				$res->bindValue(4, $obj->getTesis(), \PDO::PARAM_STR);
				$res->bindValue(5, $obj->getLugar(), \PDO::PARAM_STR);
				$res->bindValue(6, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];
				
			} catch (\PDOException $e) {
				return ['ok' => true, 'error' => $e->getMessage()];
			}
		}

		/**
		 *  Metodo que elimina de la DB un estudio realizado por el docente
		 * @return Array con la info de la transaccion
		 */
		public static function delete($id) {
			try {

				$conn = DB::instance();
				$query = "DELETE FROM formacion WHERE id = ?";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];
				
			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => $e->getMessage()];
			}
		}
	}

?>