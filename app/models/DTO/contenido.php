<?php  

	namespace App\Models\DTO;


	/**
	* Clase DTO para la gestion de las distintas categorias,
	* representa la entidad contenido en la DB
	*/
	class Contenido {

		/**
		 * @var id identificador de la sub-categoria a la que pertenece
		 */
		private $_id;

		/**
		 * @var $img contiene el nombre de la imagen asociada a cada categoria
		 */
		private $_img;

		/**
		 * @var $desc_img contiene la descripcion de la imagen asociada a cada categoria
		 */
		private $_desc_img;
		
		/**
		 * @var $texto contiene el contenido asociada a cada categoria
		 */
		private $_texto;

		/**
		 * @var $id_admin contiene el nombre del administrador que ha registrado la informacion
		 */
		private $_id_admin;

		function __construct($id, $img, $desc_img, $texto, $id_admin)
		{
			$this->_id =  $id;
			$this->_img = $img;
			$this->_desc_img = $desc_img;
			$this->_texto = $texto;
			$this->_id_admin = $id_admin;
		}

		/**
		 * Metodos Getters y Setters
		 */
		function getId()
		{
			return $this->_id;
		}

		function setId($id)
		{
			$this->_id = $id;
		}

		function getImg()
		{
			return $this->_img;
		}

		function setImg($img)
		{
			$this->_img = $img;
		}

		function getImgDesc()
		{
			return $this->_desc_img;
		}

		function setImgDesc($desc)
		{
			$this->_desc_img = $desc;
		}

		function getTexto()
		{
			return $this->_texto;
		}

		function setTexto($text)
		{
			$this->_texto = $text;
		}

		function getAdmin()
		{
			return $this->_id_admin;
		}

		function setAdmin($id_admin)
		{
			$this->_id_admin = $id_admin;
		}
	}
?>