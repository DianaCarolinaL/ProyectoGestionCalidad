<?php  

	namespace App\Models;


	use \Core\Database as DB;


	/**
	 *  Clase DAO que controla el acceso a la informacion para la gestion de los documentos en la DB
	 */
	 class Gestion_DocumentoDAO {


	 	/**
	 	 *  Metodo que guarda en la DB la info para el control de un documento dado
	 	 * @param obj corresponde al objeto que contiene la info de control del doc
	 	 * @return Array con la info de la transaccion
	 	 */
	 	public static function insert($obj) {
	 		try {
	 			$conn = DB::instance();
	 			$query = "INSERT INTO gestion_documentos(id_documento, fecha_modificacion, expide, version, estado, revisado, aprobado) VALUES(?,?,?,?,?,?,?)";
	 			$res = $conn->prepare($query);
	 			$res->bindValue(1, $obj->getIdDoc(), \PDO::PARAM_INT);
	 			$res->bindValue(2, $obj->getFechaMod(), \PDO::PARAM_STR);
	 			$res->bindValue(3, $obj->getExpide(), \PDO::PARAM_STR);
	 			$res->bindValue(4, $obj->getVersion(), \PDO::PARAM_INT);
	 			$res->bindValue(5, $obj->getEstado(), \PDO::PARAM_STR);
	 			$res->bindValue(6, $obj->getRevisado(), \PDO::PARAM_INT);
	 			$res->bindValue(7, $obj->getAprobado(), \PDO::PARAM_INT);
	 			$res->execute();
	 			$conn->close();
	 			return ['ok' => true];
	 			
	 		} catch (\PDOException $e) {
	 			return ['ok' => false, 'error' => $e->getMessage()];
	 		}
	 	}

	 	/**
	 	 *  Metodo que obtiene todos los registros de la tabla gestion_documentos de la DB
	 	 * @return obj JSON con los registros consultados
	 	 */
	 	public static function findAll() {
	 		try {
	 			$conn = DB::instance();
	 			$query = "SELECT g.*, d.titulo,d.id,d.documento FROM gestion_documentos g INNER JOIN documentos d ON d.id = g.id_documento";
	 			$res = $conn->prepare($query);
	 			$res->execute();
	 			$conn->close();
	 			return json_encode($res->fetchAll());
	 			
	 		} catch (\PDOException $e) {
	 			return null;
	 		}
	 	}
	} 

?>