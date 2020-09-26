<?php

	namespace Core;

	session_start();

	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'usuarios.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'auth.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'contenido.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'recursos.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'documentos.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'formacion.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'categorias.php';
	include PROJECTPATH . DS .'app'. DS .'controllers'. DS .'proyectos.php';

	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'contenido.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'documentos.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'categorias.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'personal.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'formacion.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'proyectos.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'gestion_documento.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'sub_categorias.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS . 'DTO'. DS .'sub_categorias2.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'contenidoDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'documentoDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'categoriasDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'sub_categoriasDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'sub_categoriasDAO2.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'personalDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'formacionDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'proyectosDAO.php';
	include PROJECTPATH . DS .'app'. DS .'models'. DS .'gestion_documentoDAO.php';

	include PROJECTPATH . DS .'core'. DS .'views.php';
	include PROJECTPATH . DS .'core'. DS .'database.php';

	/**
	* Clase que se encarga de gestionar las peticiones a los controladores
	*/
	class App {

		/**
		 * @var $_instancia almacenara una unica instancia de la clase App
		 */
		private static $_instancia;

		/**
		 * @var $_controller almacenara el nombre del controlador que enviemos por get
		 */
		private $_controller;

		/**
		 * @var $_medoto almacenara el nombre del metodo ha ejecutar, por defecto es index
		 */
		private $_method = "index";

		/**
		 * @var $_params almacenara los parametro que se pasen por get
		 */
		private $_params = [];

		/**
		 * @var NAMESPACE_CONTROLLERS almanece el namespace de los controladores
		 */
		const NAMESPACE_CONTROLLERS = "\App\Controller\\";

		/**
	     * @var CONTROLLERS_PATH almacena la ruta a los controladores
	     */
	    const CONTROLLERS_PATH = "app/controllers/";

		private function __construct () {

			 //obtenemos la url parseada
        	$url = $this->parseUrl();

        	if (!empty($url[0])) {

				//comprobamos que exista el archivo en el directorio Controllers
				if (file_exists(self::CONTROLLERS_PATH . $url[0] . ".php")) {

					$this->_controller = ucfirst($url[0]);
					unset($url[0]);
				}
				else {
					//echo self::CONTROLLERS_PATH . ucfirst($url[0]) . ".php";
					include VIEWSPATH . DS . "errors" . DS . "404.php";
	        		exit;
				}
			}
			else {
				$this->_controller = "Usuarios";
			}

			//obtenemos la clase con su espacio de nombres
    		$fullClass = self::NAMESPACE_CONTROLLERS . $this->_controller;

    		//asociamos la instancia a $this->_controller
    		$this->_controller = new $fullClass;

    		// validamos si existe un metodo
    		if (isset($url[1])) {

    			 //aquí tenemos el método
            	$this->_method = $url[1];

    			// si existe un metodo procedemos a borrar la posicion correspondiente
    			if (method_exists($this->_controller, $this->_method)) {

    				unset($url[1]);
    			}
    			else {
    				throw new \Exception("Error Processing Method {$this->_method}", 1);
    			}
    		}

			//asociamos el resto del array a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        	$this->_params = $url ? array_values($url) : [];

		}

		public static function getInstance() {
	        if (!isset(self::$_instancia)) {

	            self::$_instancia = new self;
	        }
	        return self::$_instancia;
	    }

		public function run() {
	        call_user_func_array(array($this->_controller, $this->_method), $this->_params);
	    }

		/**
	     *
	     * @return [array] [contiene la descripcion del controlador el metodo y los parametros]
	     */
	    public function parseUrl() {
	        if(isset($_GET["url"])) {
	            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
	        }
	    }

	    /**
	     * [getConfig Obtenemos la configuración de la app]
	     * @return [Array] [Array con la Config]
	     */
	    public static function getConfig() {
	        return parse_ini_file(PROJECTPATH . DS . 'core/config.ini');
	    }
	}

?>
