<?php 
	namespace Core;

	/**
	* Clase que gestiona las vistas y las peticiones echas por el controlador a la vista
	*/
	class View {
		
		/**
		 * @var data, contiene todos los datos utilizados por la vista contenido en un array
		 */
		protected static $data;

		/**
		 * Metodo que permite mostrar una plantilla 
		 *@var template plantilla que se desea procesar
		 * 
		 */
		public static function render($template) {

			if (!file_exists(VIEWSPATH . DS . $template . ".php")) {
				
				throw new \Exception("Error:" . VIEWSPATH . DS . $template . ".php, No existe", 1);
			}

			// Activar el buffer de salida
	        ob_start();
	        // Importar datos del array a la tabla de simbolos actual
	        if (!empty(self::$data)) {
	        	extract(self::$data);
	        }
	        // Incluimos el template correspondiente
	        include(VIEWSPATH . DS . $template . ".php");
	        // Devolvemos el contenido del búfer de salida
	        $str = ob_get_contents();
	        // Limpiar el búfer de salida y deshabilitar el almacenamiento en el mismo
	        ob_end_clean();
	        // Se imprime lo que habia en el buffer
	        echo $str;		
	    }

	    /**
	     * [set Metodo para enviar parametros a las vistas]
	     * @param [string] $name  [key]
	     * @param [mixed] $value [value]
	     */
	    public static function set($name, $value) {
	        self::$data[$name] = $value;
	    }

	}

?>