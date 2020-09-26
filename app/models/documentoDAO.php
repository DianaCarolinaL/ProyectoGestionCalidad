<?php  

	namespace App\Models;

	use \Core\Database as DB;


	/**
	*  Clase que controla la gestion con la DB para los documentos de cada categoria del modelo documental
	*/
	class DocumentoDAO {
		
		
		/**
		 *  Metodo que guarda en la base de datos la informacion referente al documento
		 * @return onjeto JSON con la respuesta a la transaccion
		*/
		public static function load($doc) {
			try {
				$conn = DB::instance();
				$query = "INSERT INTO documentos(titulo,descripcion, documento, id_contenido) VALUES(?,?,?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $doc->getTitulo(), \PDO::PARAM_STR);
				$res->bindValue(2, $doc->getDescripcion(), \PDO::PARAM_STR);
				$res->bindValue(3, $doc->getDocumento(), \PDO::PARAM_STR);
				$res->bindValue(4, $doc->getIdContenido(), \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];
			} catch(\PDOException $e) {
				return ['ok' => true, 'error' => 'Error:! ' . $e->getMessage()];
			}
		}

		/**
		 *  Metodo que trae todos los documentos relacionados con una categoria
		 * @var $id identifica la categoria a consultar
		 * @return Array con los documentos encontrados
		 */
		public static function select($id) {
			try {
				$conn = DB::instance();
				$query = "SELECT * FROM documentos WHERE id_contenido = ? ORDER BY id DESC";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$rows = $res->rowCount();
				$conn->close();
				if ($rows > 0) {
					return $res->fetchAll();
				}
				return null;

			} catch (\PDOException $e) {
				print($e-getMessage());
				return null;
			}
		}

		/**
		 * Metodo que borra informacion de un documenton de la DB
		 * @var $id identificador del documento en la DB
		 * @return Array con informacion de la transaccion
		 */
		public static function delete($id) {
			try {

				$conn = DB::instance();
				$query = "DELETE g, d FROM documentos d INNER JOIN gestion_documentos g ON d.id = g.id_documento WHERE d.id = ?";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];
				
			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => 'Error:! ' . $e->getMessage()];
			}
		}

		/**
		 * Metodo que retorna el id del ultimo documento guardado
		 * @return id del documento
		 */
		public static function findMax() {
			try {

				$conn = DB::instance();
				$query = "SELECT MAX(id) FROM documentos";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return $res->fetch()[0];
				
			} catch (\PDOException $e) {
				return null;
			}
		}
	}

?>