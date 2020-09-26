<?php  

	namespace App\Models;


	use \Core\Database as DB;
	use \App\Models\DTO\Contenido as ContDTO;


	/**
	*  Clase DAO que gestiona la comunicacion con la base de datos para administrar las categorias
	*/
	class ContenidoDAO {
		
		/**
		 * Metodo que guarda en la base de datos, la informacion de las categorias
		 * @var $content Object, contiene la informacion del contenido
		 * @return Array, con informacion sobre la transaccion
		 */
		public static function insert($content) {
			try {
				
				$conn = DB::instance();
				$query = "INSERT INTO contenido(id, imagen, desc_img, texto, id_admin) VALUES(?,?,?,?,?)";
				$res = $conn->prepare($query);
				$res->bindValue(1, $content->getId(), \PDO::PARAM_INT);
				$res->bindValue(2, $content->getImg(), \PDO::PARAM_STR);
				$res->bindValue(3, $content->getImgDesc(), \PDO::PARAM_STR);
				$res->bindValue(4, $content->getTexto(), \PDO::PARAM_STR);
				$res->bindValue(5, $content->getAdmin(), \PDO::PARAM_INT);
				$res->execute();
				$conn->close();
				return ['ok' => true];

			} catch (\PDOException $e) {
				return ['ok' => false, 'error' => 'Error1!: ' . $e->getMessage() ." admin "];
			}				
		}

		/**
		 *  Metodo que obtiene informacion de la base de datos de una categoria respectiva
		 *  Identificada por la variable $id
		 * @var $id, identificador del contenido a seleccionar
		 * @return Array, Informacion obtenida de la DB
		 */
		public static function select($id) {
			try {

				$conn = DB::instance();
				$query = "SELECT c.id,c.texto,c.imagen,c.desc_img FROM contenido c WHERE c.id = ?";
				$res = $conn->prepare($query);
				$res->bindParam(1, $id, \PDO::PARAM_INT);
				$res->execute();
				$rows = $res->rowCount();
				$conn->close();
				if ($rows > 0) {
					return $res->fetch();					
				}
				return null;

			} catch (\PDOException $e) {
				return null;
			}
		}

		/**
		 *  Metodo que actualiza la informacion en la DB de una categoria del modelo documental
		 * @var $content objeto que contiene la informacion de una categoria del modelo documental
		 * @return Array, con informacion sobre la transaccion
		 */
		public static function update($content) {
			try{
				$conn = DB::instance();
				$query = "UPDATE contenido SET imagen = ?, desc_img = ?, texto = ?, id_admin = ? WHERE id = ? LIMIT 1";
				$res = $conn->prepare($query);
				$res->bindValue(1, $content->getImg(), \PDO::PARAM_STR);
				$res->bindValue(2, $content->getImgDesc(), \PDO::PARAM_STR);
				$res->bindValue(3, $content->getTexto(), \PDO::PARAM_STR);
				$res->bindValue(4, $content->getAdmin(), \PDO::PARAM_INT);
				$res->bindValue(5, $content->getId(), \PDO::PARAM_STR);
				$res->execute();
				$conn->close();
				return ['ok' => true];
			}catch(\PDOException $e){
				return ['ok' => false, 'error' => "Error2!: ". $e->getMessage()];
			}
		}
	}

?>