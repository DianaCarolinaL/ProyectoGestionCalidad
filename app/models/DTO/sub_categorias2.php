<?php

	namespace App\Models\DTO;


	/**
	*  Clase para el manejo de las sub-categorias existentes
	*/
	class Sub_categorias2 {

		/**
		 * @var $_id identificador unico de la subcategoria
		 */
		private $_id;

		/**
		 * @var $_nombre nombre de la sub-categoria
		 */
		private $_nombre;

		/**
		 * @var $_id_categoria identifica a la subcategoria a la que pertenece
		 */
		private $_id_categoria;

		function __construct($nombre, $id_categoria) {
			$this->_nombre = $nombre;
			$this->_id_categoria = $id_categoria;
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

		public function getIdSubCategoria() {
			return $this->_id_categoria;
		}

		public function setIdSubCategoria($id_cat) {
			$this->_id_categoria = $id_cat;
		}
	}

?>
