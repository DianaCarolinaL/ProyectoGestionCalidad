<?php  

	namespace App\Models\DTO;


	/**
	*  Clase DTO para la gestion de las formaciones academicas del personal
	*/
	class Formacion {

		/**
		 * @var $titulo titulo obtenido
		 */
		private $_titulo;

		/**
		 * @var $fini fecha de inicio de  la formacion
		 */
		private $_fini;

		/**
		 * @var $ffin fecha de terminacion de la formacion
		 */
		private $_ffin;

		/**
		 * @var $tesis trabajo realizado para obtener el titulo
		 */
		private $_tesis;

		/**
		 * @var $lugar lugar donde realizo la formacion
		 */
		private $_lugar;

		/**
		 * @var $_id_doc identificador del docente
		 */
		private $_id_doc;
		
		function __construct($titulo, $fini, $ffin, $tesis, $lugar, $id_doc) {
			$this->_titulo = $titulo;
			$this->_fini = $fini;
			$this->_ffin = $ffin;
			$this->_tesis = $tesis;
			$this->_lugar = $lugar;
			$this->_id_doc = $id_doc;
		}

		public function getTitulo() {
			return $this->_titulo;
		}

		public function setTitulo($titulo) {
			$this->_titulo = $titulo;
		}

		public function getFechaIni() {
			return $this->_fini;
		}

		public function setFechaIni($fini) {
			$this->_fini = $fini;
		}

		public function getFechaFin() {
			return $this->_ffin;
		}

		public function setFechaFin($ffin) {
			$this->_ffin = $ffin;
		}

		public function getTesis() {
			return $this->_tesis;
		}

		public function setTesis($tesis) {
			$this->_tesis = $tesis;
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