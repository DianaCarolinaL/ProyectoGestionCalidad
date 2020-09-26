<?php  

	namespace App\Controller;

	use \App\Models\CategoriaDAO as CatDAO;
	use \App\Models\Sub_CategoriaDAO as SubCatDAO;
	use \App\Models\DTO\Categoria as CatDTO;
	use \App\Models\ContenidoDAO as ContDAO;
	use \App\Models\DocumentoDAO as DocsDAO;
	use \App\Models\Personal as PerDAO;
	use \App\Models\DTO\Sub_categorias2 as SubCatDTO2;
	use \App\Models\DTO\Sub_categorias as SubCatDTO;
	use \App\Models\Sub_CategoriaDAO2 as SubCatDAO2;
	use \Core\View;


	/**
	*  Clase controladora que gestiona las peticiones de los usuarios finales
	*/
	// crear un metodo para implementar lo de las categorias
	class Usuarios {
		
		function index() {
			$categorias = CatDAO::select();
			$subCat = SubCatDAO::select();
			$subCat2 = SubCatDAO2::select();
			$data = $this->pushSubCategories($categorias, $subCat, $subCat2);
			View::set("categorias", $data);			
			View::render("home". DS . "home");
		}

		/**
		 *  Metodo que crea los objetos de las categorias y asigna las sub-categorias a cada categoria
		 */
		private function pushSubCategories($cat, $subCat, $subCat2) {
			if (!empty($cat) and !empty($subCat)) {
				$obj = array();
				foreach ($cat as $value) {
					$id = $value[0];
					$newCat = new CatDTO($value[1]);
					$newCat->setId($id);
					$array = array();
					for ($i=0; $i < count($subCat); $i++) {
						if ($id == $subCat[$i][2]) {
							$sub = new SubCatDTO($subCat[$i][1], $subCat[$i][2]);
							$sub->setId($subCat[$i][0]);
							$arraySub = array();
							if (!empty($subCat2)) {
								foreach ($subCat2 as $s) {
									if ($subCat[$i][0] == $s[2]) {
										$sc = new SubCatDTO2($s[1], $s[2]);
										$sc->setId($s[0]);
										$arraySub[] = $sc;
									}
								}
							}
							$sub->setSubCategorias($arraySub);
							$array[] = $sub;
						}
					}
					$newCat->setSubCategorias($array);
					$obj[] = $newCat;
				}
			}
			return $obj;
		}

		/**
		 *  Metodo que obtiene la info y los documentos de un modelo que son pasados por el DAO
		 */
		function secciones($secc, $id) {
			$categorias = CatDAO::select();
			$subCat = SubCatDAO::select();
			$subCat2 = SubCatDAO2::select();
			$data = $this->pushSubCategories($categorias, $subCat, $subCat2);
			$info = ContDAO::select($id);
			$docs = DocsDAO::select($id);
			View::set("categorias", $data);
			View::set("titulo", str_replace('_', ' ', $secc));
			View::set("desc", "A continuación podra visualizar la información de ".str_replace('_', ' ', $secc).", así como los archivos asociados");
			View::set("seccion", $info);
			View::set("docs", $docs);
			View::render("secciones". DS . "sections");
		}

		/**
		 *  Metodo que recibe la info de los docentes pasados desde el DAO
		 */
		function show() {
			$categorias = CatDAO::select();
			$subCat = SubCatDAO::select();
			$subCat2 = SubCatDAO2::select();
			$data = $this->pushSubCategories($categorias, $subCat, $subCat2);
			$docentes = PerDAO::select();
			View::set("categorias", $data);
			View::set("titulo", 'Docentes del programa de Ingeniería de Sistemas');
			View::set("desc", "A continuación podra visualizar los docentes que pertenecen al programa de Ingenieria de Sistemas");
			View::set("docentes", $docentes);
			View::render('docentes' . DS . 'docentes');
		}
		
	}

?>