<?php  

	namespace App\Models;

	use \Core\Database as DB;


	/**
	* Clase del modelo que gestiona las peticiones para los administradores a la base de datos 
	*/
	class Admin {
		
		static function auth($email) {
			try {
				$con = DB::instance();
				$query = "SELECT * FROM administradores a WHERE a.email = ? LIMIT 1";
				$res = $con->prepare($query);
				$res->bindParam(1, $email, \PDO::PARAM_STR);
				$res->execute();
				//$con->close();
				return $res->fetch();
			}
			catch(\PDOException $e) {
	            print "Error!: " . $e->getMessage();
	        }

		}
	}

?>