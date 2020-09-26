<?php  

	namespace App\Models;

	use \Core\Database as DB;


	/**
	*  Clase que controla la gestion a la DB de las categorias de los distintos modelos
	*/
	class CategoriaDAO {
		

		/**
		 *  Metodo que obtiene todas las categorias registradas en la DB
		 * @return array con las categorias
		 */
		public static function select() {
			try {

				$conn = DB::instance();
				$query = "SELECT c.id as id_cat_prin, c.nombre as nom_cat_prin FROM categorias c";
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

		
	}

?>