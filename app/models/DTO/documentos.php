<?php  

	namespace App\Models\DTO;

	/**
	*  Clase DTO que representa los documentos cargados en el sistema
	*/
	class Documento {
		
		/**
		 * @var $id representa el identificador unico del documento
		 */
		private $_id;

		/**
		 * @var $titulo contiene el titulo del documento
		 */
		private $_titulo;

		/**
		 * @var $descripcion contiene la descripcion del documento
		 */
		private $_descripcion;

		/**
		 * @var $id_contenido contiene el identificador de la categoria a la que pertenece
		 */
		private $_id_contenido;

		/**
		 * @var $documento contiene el nombre del documento
		 */
		private $_documento;

		function __construct($titulo, $descripcion, $id_contenido, $doc)	{
			$this->_titulo = $titulo;
			$this->_descripcion = $descripcion;
			$this->_id_contenido = $id_contenido;
			$this->_documento = $doc;
		}

		/**
		 * Metodos Getters y Setters
		 */
		function getId()
		{
			return $this->_id;
		}

		function getTitulo()
		{
			return $this->_titulo;
		}

		function setTitulo($title)
		{
			$this->_titulo = $title;
		}

		function getDescripcion()
		{
			return $this->_descripcion;
		}

		function setDescripcion($desc)
		{
			$this->_descripcion = $desc;
		}

		function getDocumento()
		{
			return $this->_documento;
		}

		function setDocumento($doc)
		{
			$this->_documento = $doc;
		}

		function getIdContenido()
		{
			return $this->_id_contenido;
		}

		function setIdContenido($id_con)
		{
			$this->_id_contenido = $id_con;
		}
	}

?>