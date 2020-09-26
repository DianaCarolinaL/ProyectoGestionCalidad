<?php  

	namespace App\Models\DTO;


	/**
	*  Clase DTO para la gestion los proyectos realizados por el docente
	*/
	class Proyectos {

		/**
		 * @var $titulo titulo del proyecto
		 */
		private $_titulo;

		/**
		 * @var $lugar lugar donde realizo el proyecto
		 */
		private $_lugar;

		/**
		 * @var $_fecha de realizacion del proyecto
		 */
		private $_fecha;

		/**
		 * @var $_id_doc id del docente
		 */
		private $_id_doc;
		
		function __construct($titulo, $lugar, $fecha, $doc) {
			$this->_titulo = $titulo;
			$this->_lugar = $lugar;
			$this->_fecha = $fecha;
			$this->_id_doc = $doc;
		}

		public function getTitulo() {
			return $this->_titulo;
		}

		public function setTitulo($titulo) {
			$this->_titulo = $titulo;
		}

		public function getFecha() {
			return $this->_fecha;
		}

		public function setFecha($fecha) {
			$this->_fecha = $fecha;
		}

		public function getLugar() {
			return $this->_lugar;
		}

		public function setLugar($lugar) {
			$this->_lugar = $lugar;
		}

		public function getIdDoc() {
			return $this->_id_doc;
		}

		public function setIdDoc($id_doc) {
			$this->_id_doc = $id_doc;
		}
	}


?>