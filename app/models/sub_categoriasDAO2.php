<?php

	namespace App\Models;


	use \Core\Database as DB;


	/**
	*  Clase DAO que controla el acceso a la DB de las sub-categorias
	*/
	class Sub_CategoriaDAO2 {


		/**
		 * Metodo que obtiene todas las sub-categorias de la DB
		 * @return array con las categorias consultadas
		 */
		public function select() {
			try {

				$conn = DB::instance();
				$query = "SELECT c.id as id_sub, c.nombre as nom_sub, c.id_subcategoria FROM sub_categoria2 c";
				$res = $conn->prepare($query);
				$res->execute();
				$rows = $res->rowCount();
				$conn->close();
				if ($rows > 0) {
					return $res->fetchAll();
				}
				return null;

			} catch (\PDOException $e) {
				return null;
			}
		}

		/**
		 * Metodo guarda en la DB una nueva categoria
		 * @return array con la info de la transaccion
		 */
		public function insert($obj) {
			try {

				$conn = DB::instance();
				$query = "INSERT INTO sub_categoria2(nombre,id_subcategoria) VALUES(?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $obj->getNombre(), \PDO::PARAM_STR);
				$res->bindValue(2, $obj->getIdSubCategoria(), \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => $e->getMessage()];
			}
		}

		/**
		 * Metodo elimina una subcategoria de la DB
		 * @return array con la info de la transaccion
		 */
		public function delete($id) {
			try {
				$conn = DB::instance();
				$query = "DELETE FROM sub_categoria2 WHERE id = ?";
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
