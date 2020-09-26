<?php  

	namespace App\Models\DTO;


	/**
	*  Clase DTO para el manejo del personal
	*/
	class Personal {

		/**
		 * @var $identificacion identificacion del integrante del personal
		 */
		private $_identificacion;

		/**
		 * @var $nombre corresponde al nombre del integrante del personal
		 */
		private $_nombre;

		/**
		 * @var $apellidos corresponde a los apellidos del integrante del personal
		 */
		private $_apellidos;

		/**
		 * @var $telefono el telefono del integrante del personal
		 */
		private $_telefono;

		/**
		 * @var $email el email del integrante del personal
		 */
		private $_email;

		/**
		 * @var cargo cargo que ocupa del integrante del personal
		 */
		private $_cargo;

		/**
		 * @var dir_laboral corresponde a la direccion laboral del integrante del personal
		 */
		private $_dir_laboral;

		/**
		 * @var url corresponde a la direccion url del curriculum vitae 
		 */
		private $_url;

		/**
		 * @var $imagen avatar del integrante del personal
		 */
		private $imagen;

		/**
		 * @var $competencias
		 */
		private $_competencias;
		
		function __construct($id, $nombre, $apellidos, $telefono, $email, $cargo, $dir, $url, $img, $compe) {
			$this->_identificacion = $id;
			$this->_nombre = $nombre;
			$this->_apellidos = $apellidos;
			$this->_telefono = $telefono;
			$this->_email = $email;
			$this->_cargo = $cargo;
			$this->_dir_laboral = $dir;
			$this->_url = $url;
			$this->_imagen = $img;
			$this->_competencias = $compe;
		}

		/* Metodos Guetters y Setters */

		public function getId() {
			return $this->_identificacion;
		}

		public function setId($id) {
			$this->_identificacion = $id;
		}

		public function getNombre() {
			return $this->_nombre;
		}

		public function setNombre($nombre) {
			$this->_nombre = $nombre;
		}

		public function getApellidos() {
			return $this->_apellidos;
		}

		public function setApellidos($apellidos) {
			$this->_apellidos = $apellidos;
		}

		public function getTelefono() {
			return $this->_telefono;
		}

		public function setTelefono($tel) {
			$this->_telefono = $tel;
		}

		public function getEmail() {
			return $this->_email;
		}

		public function setEmail($email) {
			$this->_email = $email;
		}

		public function getCargo() {
			return $this->_cargo;
		}

		public function setCargo($cargo) {
			$this->_cargo = $cargo;
		}

		public function getDirLaboral() {
			return $this->_dir_laboral;
		}

		public function setDirLaboral($dir) {
			$this->_dir_laboral = $dir;
		}

		public function getUrl() {
			return $this->_url;
		}

		public function setUrl($url) {
			$this->_url = $url;
		}

		public function getImg() {
			return $this->_imagen;
		}

		public function setImg($img) {
			$this->_imagen = $img;
		}

		public function getCompetencias() {
			return $this->_competencias;
		}

		public function setCompetencias($compe) {
			$this->_competencias = $compe;
		}
	}

?>