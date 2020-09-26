<?php

	namespace App\Controller;


	use \App\Models\DTO\Sub_categorias as SubCatDTO;
	use \App\Models\DTO\Sub_categorias2 as SubCatDTO2;
	use \App\Models\DTO\Categoria as CatDTO;
	use \App\Models\CategoriaDAO as CatDAO;
	use \App\Models\Sub_CategoriaDAO as SubCatDAO;
	use \App\Models\Sub_CategoriaDAO2 as SubCatDAO2;
	use \Core\View;


	/**
	*  Clase controladora que gestiona las peticiones realizadas sobre las distintas categorias de los modelos
	*/
	class Categorias {


		/**
		 * Metodo que muestra el formulario de registro de nuevas categorias
		 */
		function show() {
			$categorias = CatDAO::select();
			$subCat = SubCatDAO::select();
			$subCat2 = SubCatDAO2::select();
			$data = $this->pushSubCategories($categorias, $subCat, $subCat2);
			View::set("categorias", $data);
			View::render('admin' . DS . 'categorias');
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
		 *  Metodo que captura los datos de la vista y los envia al DAO
		 */
		function insert() {
			$cat = $_POST['id_categoria'];
			$sub = $_POST['sub_categoria'];
			if (!empty($cat) and !empty($sub)) {
				$obj = new SubCatDTO($sub, $cat);
				$json = SubCatDAO::insert($obj);
			}
			else {
				$json = ['ok' => false, 'error' => 'Faltan datos por ingresar'];
			}

			print(json_encode($json));
		}

		/**
		 *  Metodo que captura los datos de la vista y los envia al DAO
		 */
		function insertSubCat () {
			$cat = $_POST['id_subcategoria'];
			$sub = $_POST['subcategoria'];
			if (!empty($cat) and !empty($sub)) {
				$obj = new SubCatDTO2($sub, $cat);
				$json = SubCatDAO2::insert($obj);
			}
			else {
				$json = ['ok' => false, 'error' => 'Faltan datos por ingresar'];
			}

			print(json_encode($json));
		}

		/**
		 *  Metodo que obtiene el id de la categoria hacer elminada y la envia al DAO
		 */
		function delete() {
			$id = $_POST['id'];
			if (!empty($id)) {
				$json = SubCatDAO::delete($id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Falta el id de la subcategoria'];
			}

			print(json_encode($json));
		}

		/**
		 *  Metodo que obtiene el id de la subcategoria hacer elminada y la envia al DAO
		 */
		function deleteSubCat() {
			$id = $_POST['id'];
			if (!empty($id)) {
				$json = SubCatDAO2::delete($id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Falta el id de la subcategoria'];
			}

			print(json_encode($json));
		}

		/**
		 * Metodo que obtiene el id de la categoria y la envia la modelo
		 */
		 function getForCategories () {
			 if (!empty($_POST['id'])) {
				 $id = $_POST['id'];
			 	 $json = SubCatDAO::getCategoriesForId($id);
			}
			else {
				$json = ['ok' => false, 'error' => 'Falta el id de la categoria '];
			}
			 print(json_encode($json));
		 }

		 /**
 		 * Metodo que obtiene el id de la subcategoria y la envia la modelo
 		 */
 		 function getForSubCategories () {
 			 if (!empty($_POST['id'])) {
 				 $id = $_POST['id'];
 			 	 $json = SubCatDAO::getSubCategoriesForId($id);
 			}
 			else {
 				$json = ['ok' => false, 'error' => 'Falta el id de la categoria '];
 			}
 			 print(json_encode($json));
 		 }
	}

?>
