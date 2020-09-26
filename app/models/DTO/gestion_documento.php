<?php  

	namespace App\Models\DTO;



	/**
	*  Clase DTO para la gestion del control de los documentos
	*/
	class Gestion_Documento	{

		/**
		 * @var id_documento identificador del documento al que se le hace el control
		 */
		private $_id_documento;

		/**
		 * @var fecha_mod fecha en la que se sube el nuevo documento
		 */
		private $_fecha_modi;

		/**
		 * @var expide quien expide el documento
		 */
		private $_expide;

		/**
		 * @var version version del documento
		 */
		private $_version;

		/**
		 * @var estado  estado del documento
		 */
		private $_estado;

		/**
		 * @var revisado indica si el documento fue revisado
		 */
		private $_revisado;

		/**
		 * @var aprobado indica si el documento fue aprobado
		 */
		private $_aprobado;


		function __construct($id_doc, $fecha_modi, $expide, $ver, $estado, $revisado, $aprobado) {
			$this->_id_documento = $id_doc;
			$this->_fecha_modi = $fecha_modi;
			$this->_expide = $expide;
			$this->_version = $ver;
			$this->_estado = $estado;
			$this->_revisado = $revisado;
			$this->_aprobado = $aprobado;
		}


		public function getIdDoc() {
			return $this->_id_documento;
		}

		public function setidDoc($id_doc) {
			$this->_id_documento = $id_doc;
		}

		public function getFechaMod() {
			return $this->_fecha_modi;
		}

		public function setFechaMod($fecha_m) {
			$this->_fecha_modi = $fecha_m;
		}

		public function getExpide() {
			return $this->_expide;
		}

		public function setExpide($expide) {
			$this->_expide = $expide;
		}

		public function getVersion() {
			return $this->_version;
		}

		public function setVersion($ver) {
			$this->_version = $ver;
		}

		public function getEstado() {
			return $this->_estado;
		}

		public function setEstado($est) {
			$this->_estado = $est;
		}

		public function getRevisado() {
			return $this->_revisado;
		}

		public function setRevisado($rev) {
			$this->_revisado = $rev;
		}

		public function getAprobado() {
			return $this->_aprobado;
		}

		public function setAprobado($apro) {
			$this->_aprobado = $apro;
		}
	}

?>