<?php  

	namespace App\Models;

	use \Core\Database as DB;


	/**
	*  Clase DAO para el gestion de la informacion de la formacion academica de un docente en la DB 
	*/
	class ProyectosDAO {
		
		public static function insert($obj) {
			try {
				$conn = DB::instance();
				$query = "INSERT INTO proyectos(titulo,lugar,fecha,id_docente) VALUES(?,?,?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getTitulo(), \PDO::PARAM_STR);
				$res->bindValue(2, $obj->getLugar(), \PDO::PARAM_STR);
				$res->bindValue(3, $obj->getFecha(), \PDO::PARAM_STR);
				$res->bindValue(4, $obj->getIdDoc(), \PDO::PARAM_INT);
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
				$query = "SELECT * FROM proyectos WHERE id_docente = ? ORDER BY id DESC";
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
				$query = "UPDATE proyectos SET titulo = ?, fecha = ?, lugar = ? WHERE id = ?";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getTitulo(), \PDO::PARAM_STR);
				$res->bindValue(2, $obj->getFecha(), \PDO::PARAM_STR);
				$res->bindValue(3, $obj->getLugar(), \PDO::PARAM_STR);
				$res->bindValue(4, $id, \PDO::PARAM_INT);
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
				$query = "DELETE FROM proyectos WHERE id = ?";
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