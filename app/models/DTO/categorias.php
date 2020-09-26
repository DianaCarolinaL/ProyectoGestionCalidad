<?php  

	namespace App\Models\DTO;


	/**
	*  Clase DTO para el manejo de las categorias de los distintos modelos
	*/
	class Categoria {

		/**
		 * @var id identifica la categoria en la DB
		 */
		private $_id;

		/**
		 * @var nombre corresponde al nombre de la categoria
		 */
		private $_nombre;

		/**
		 * @var sub_categoria contiene un array de todas las subcategorias
		 */
		private $_sub_categorias = [];

		
		function __construct($nombre) {
			$this->_nombre = $nombre;
		}

		/* Metodos Guetter y Setter*/

		public function getId() {
			return $this->_id;
		}

		public function setId($id) {
			$this->_id = $id;
		}	

		public function getNombre() {
			return $this->_nombre;
		}	

		public function setNombre($nombre) {
			$this->_nombre = $nombre;
		}

		public function getSubCategorias() {
			return $this->_sub_categorias;
		}

		public function setSubCategorias($sub_cat) {
			$this->_sub_categorias = $sub_cat;
		}
	}

?>