$(document).ready(function () {
	/*
	* Evento que se ejecuta a la hora de guardar o actualizar informacion de alguna de las categorias
	*/
	$("#btn-category").on("click", function() {

		var desc_img = document.getElementById('desc-img').value;
		var texto = document.getElementById('cont-category').value;
		var action = document.getElementById('type-action').value;
		var cat = document.getElementById("type-category").value;
		var img = document.getElementById('image').files[0];
		var formdata = new FormData(document.getElementById('form-category'));

		if (action == 'update') {
			img = actualizarCategoria(img);
		}
		formdata.append("archivo", img);
		formdata.append("texto", texto);
		formdata.append("categoria", cat);
		formdata.append("desc_img", desc_img);

		$.ajax({
			url: "../../contenido/category/" + action,
			type: "post",
			data: formdata,
			contentType: false,
			processData: false,
			success: function(res) {				
				var response = JSON.parse(res);
				console.log(response);
				if (response.ok) {
					location.reload(true);
				}
				else {
					console.log("No se ha subido la imagen: "+response.error);
					$.jGrowl(response.error, {
						position: "bottom-right",
						header: "Fallo del Registro",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});

	});

	function actualizarCategoria(img) {
		if (img != undefined) {
			return img;
		}
		return document.getElementById("img_principal").src.split("/").pop();
	}

	/*
	*  Evento sobre el formulario de cargar documentos que envia la informacion al servidor
	*/
	$("#btn-load-doc").on("click", function() {
		var form = document.getElementById("form-load-doc");
		var formdata = new FormData(form);

		$.ajax({
			url: "../../contenido/documento/cargarDocumento",
			type: "post",
			data: formdata,
			processData: false,
			contentType: false,
			success: function(response) {
				console.log(response);
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Registro de documentos",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});

	/*
	* Evento que borra un documento de la DB y del servidor
	*/
	$("body").on('click', '.btn-delete-doc', function(){
		var btn = $(this);
		var id = btn.data('id');
		var doc = btn.data('name');
		$.ajax({
			url: '../../documentos/delete',
			type: 'post',
			data: {
				id: id,
				doc: doc
			},
			success: function(response) {
				console.log(response);
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl("No se ha podido eliminar el documento", {
						position: "bottom-right",
						header: "Registro de documentos",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});

	/*
	* Evento que elimina un integrante del personal
	*/
	$("body").on("click", ".btn-delete-person", function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.get("../../personal/delete/"+id, function(response){
			console.log(response);
			var res = JSON.parse(response);
			if (res.ok) {
				//document.getElementById("person-"+id).remove();
				$(this).parent().parent().remove();
				location.reload(true);
			}
			else {
				$.jGrowl("No se puedo eliminar el recurso", {
					position: "bottom-right",
					header: "Eliminación fallida",
					theme: "bg-red",
					life: 5000
				});
			}
		});

	});

	/*
	* Evento que actualiza la informacion del personal
	*/
	$("#btn-update-per").on("click", function(){
		var form = document.getElementById("form-update-per");
		var formdata = new FormData(form);
		$.ajax({
			url: "../../actores/update",
			type: "post",
			data: formdata,
			processData: false,
			contentType: false,
			success: function(response) {
				console.log(response);
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Ocurrio un problema",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});

	/*
	* Evento que se dispara a la hora de actualizar la formacion de un docente
	*/
	$("#btn-update-estudy").on("click", function(e) {
		var form = document.getElementById("form-update-est");
		var formdata = new FormData(form);
		var action = document.getElementById("action").value == "register"? "register" : "update";
		console.log(action);
		$.ajax({
			url: "../../estudios/"+action,
			type: "post",
			data: formdata,
			contentType: false,
			processData: false,
			success: function( response ) {
				console.log(response);
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Ocurrio un problema",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});
	/*
	* Evento que se dispara a la hora de actualizar un proyecto
	*/
	$("#btn-update-proy").on("click", function(e) {
		var form = document.getElementById("form-update-proy");
		var formdata = new FormData(form);
		var action = document.getElementById("action2").value == "register"? "register" : "update";
		console.log(action);
		$.ajax({
			url: "../../proyecto/"+action,
			type: "post",
			data: formdata,
			contentType: false,
			processData: false,
			success: function( response ) {
				console.log(response);
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Ocurrio un problema",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});

	/*
	* Evento que se dispara a la hora de borrar algun tipo de formacion del docente
	*/
	$(".btn-delete-est").on("click", function(){
		var id = $(this).data('id');
		$.post('../../estudios/delete/', {id: id}, function(response) {
			var res = JSON.parse(response);
			if (res.ok) {
				location.reload(true);
			}
			else {
				$.jGrowl(res.error, {
					position: "bottom-right",
					header: "Ocurrio un problema",
					theme: "bg-red",
					life: 5000
				});
			}
		});
	});

	/*
	* Evento que se dispara a la hora de borrar algun tipo de formacion del docente
	*/
	$(".btn-delete-proy").on("click", function(){
		var id = $(this).data('id');
		$.post('../../proyecto/delete/', {id: id}, function(response) {
			var res = JSON.parse(response);
			if (res.ok) {
				location.reload(true);
			}
			else {
				$.jGrowl(res.error, {
					position: "bottom-right",
					header: "Ocurrio un problema",
					theme: "bg-red",
					life: 5000
				});
			}
		});
	});

	/*
	* Evento que se dispara cuando se quiere guardar una subcategoria
	*/
	$("#btn-subcategoria-save"	).on("click", function(){
		var form = document.getElementById("form-save-subcat");
		var formdata = new FormData(form);

		$.ajax({
			url: "../../categorias/insert/",
			type: "post",
			data: formdata,
			contentType: false,
			processData: false,
			success: function(response) {
				var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Ocurrio un problema",
						theme: "bg-red",
						life: 5000
					});
				}
			}
		});
	});

	/*
	* Evento que se dispara cuando se desea eliminar una categoria
	*/
	$("body").on("click", ".btn-delete-categorias", function(){
		var id = $(this).data("id");

		$.post('../../categorias/delete/', {id:id}, function(response){
			var res = JSON.parse(response);
				if (res.ok) {
					location.reload(true);
				}
				else {
					$.jGrowl(res.error, {
						position: "bottom-right",
						header: "Ocurrio un problema",
						theme: "bg-red",
						life: 5000
					});
				}
		});
	});

	/**
	 * Evento que se dispara cuando se seleciona una categoria
	 */
	 $('#tbl-cat').on('click', 'tr', function () {
		 var id = $(this).data('id');
		 if (id !== undefined) {
			 $.ajax({
				 url: '../../categorias/getForCategories/',
				 data: {
					 id: id
				 },
				 type: 'post',
				 success: function (response) {
					 var res = JSON.parse(response);
					 var html = "";
					 var tbl = $("#tbl-subcat");
					 var select = $("#subcategoria-id");
					 $("#btn-subcat2").data('supercat', id);
					 if (res.ok === undefined) {
						 var btn = $("#btn-subcat");
						 var html2 = "";
						 for (obj of res) {
						 	html += `<tr style="cursor:pointer" data-sub="${obj.id}">
	   					   <td>${obj.nombre}</td>
	                     <td><button data-id="${obj.id}" class="btn btn-danger btn-delete-categorias"><i class="fa fa-trash"></i></button></td>
	   					</tr>`;
							html2 += `<option value="${obj.id}">${obj.nombre}</option>`;
						 }
						 btn.data('categoria', id);
					 }
					 else {
						 html += `<tr>
	 						<td>No hay subcategorias registradas</td>
	 						<td></td>
	 					</tr>`;
						html2 = `<option value="">No hay subcategorias</option>`;
					 }
					 tbl.html(html);
					 select.html(html2);
					 btn.css('visibility', 'visible');
				 }
			 });
		 }
	 });

	 /*
	 * Evento que se dispara cuando se desea eliminar una subcategoria
	 */
	 $("body").on("click", ".btn-del-subcat", function(){
		 var id = $(this).data("id");

		 $.post('../../categorias/deleteSubCat/', {id:id}, function(response){
			 var res = JSON.parse(response);
				 if (res.ok) {
					 location.reload(true);
				 }
				 else {
					 $.jGrowl(res.error, {
						 position: "bottom-right",
						 header: "Ocurrio un problema",
						 theme: "bg-red",
						 life: 5000
					 });
				 }
		 });
	 });

	 /**
	  * Evento que se dispara cuando se abre la venta modal de Registro
	  * de nuevas categorias
	  */
	  $('#modal-categorias').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('categoria') // Extract info from data-* attributes
		  var select = $("#categoria-id");
		  select.val(id);
	  });

	 /**
	  * Evento que se diapara cuando se desea registrar una nueva categoria
	  */
	  $("#tbl-subcat").on("click", 'tr', function () {
		  var id = $(this).data('sub');
		  if (id !== undefined) {
	 		 $.ajax({
	 			 url: '../../categorias/getForSubCategories/',
	 			 data: {
	 				 id: id
	 			 },
	 			 type: 'post',
	 			 success: function (response) {
	 				 var res = JSON.parse(response);
	 				 var html = "";
	 				 var tbl = $("#tbl-subcat2");
					 var btn = $("#btn-subcat2");
					 btn.data('categoria', id);
	 				 if (res.ok === undefined && res.length > 0) {
	 					 for (obj of res) {
	 					 	html += `<tr style="cursor:pointer">
	    					   <td>${obj.nombre}</td>
	                      <td><button data-id="${obj.id}" class="btn btn-danger btn-del-subcat"><i class="fa fa-trash"></i></button></td>
	    					</tr>`;
	 					 }
	 					 btn.data('categoria', id);
	 				 }
	 				 else {
	 					 html += `<tr>
	  						<td>No hay subcategorias registradas</td>
	  						<td></td>
	  					</tr>`;
	 				 }
	 				 tbl.html(html);
					 btn.css('visibility', 'visible');
	 			 }
	 		 });
		 }
	  });

	  /**
 	  * Evento que se dospara cuando se abre la venta modal de Registro
 	  * de nuevas subcategorias
 	  */
 	  $('#modal-subcategorias').on('show.bs.modal', function (event) {
 		  var button = $(event.relatedTarget) // Button that triggered the modal
 		  var id = button.data('categoria') // Extract info from data-* attributes
		  var id2 = button.data('supercat')
		  $("#subcategoria-id").val(id);
		  $("#supercategoria-id").val(id2);
		  console.log("dsd" +id + id2);
 	  });

	  /*
  	* Evento que se dispara cuando se quiere guardar una subcategoria
  	*/
  	$("#btn-subcategoria-save2").on("click", function(){
  		var form = document.getElementById("form-save-subcat2");
  		var formdata = new FormData(form);

  		$.ajax({
  			url: "../../categorias/insertSubCat/",
  			type: "post",
  			data: formdata,
  			contentType: false,
  			processData: false,
  			success: function(response) {
  				console.log(response);
  				var res = JSON.parse(response);
  				if (res.ok) {
  					location.reload(true);
  				}
  				else {
  					$.jGrowl(res.error, {
  						position: "bottom-right",
  						header: "Ocurrio un problema",
  						theme: "bg-red",
  						life: 5000
  					});
  				}
  			}
  		});
  	});

  	$("body").on("mouseenter", ".treeview-menu.menu-open li", function(e) {
  		$(this).addClass("active");
  	});

  	$("body").on("mouseleave", ".treeview-menu.menu-open li", function(e) {
  		$(this).removeClass("active");
  	});
});
