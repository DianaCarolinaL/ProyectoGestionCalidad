<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-top.php'; ?>

<section class="content-header no-index">
    <div class="info-box p-rel">
    	<span class="info-box-icon"><i class="fa fa-book"></i></span>
    	<div class="info-box-content">
          	<h2 class="info-box-text"><b>Panel de Administracion de Categorias</b></h2>
          	<span class="info-box-number">A continuación podra gestionar las categorias existentes</span>
        </div>
    </div>
</section>
<section class="content">
	<!-- Your Page Content Here -->
   <div class="col-md-4">
   	<div class="box box-danger">
   		<div class="box-header with-border text-center">
   			<h3 class="box-title"><b>Listado de Categorias</b></h3>
   		</div>
   		<div class="box-body">
   			<table class="table table-bordered">
   				<thead>
   					<tr>
   						<th>Categoria</th>
   					</tr>
   				</thead>
   				<tbody id="tbl-cat">
   					<?php
   						if (!empty($categorias)) {
   							foreach ($categorias as $c) {
									print('
										<tr style="cursor:pointer" data-id="'.$c->getId().'" class="row-cat">
											<td>'.$c->getNombre().'</td>
										</tr>');
   							}
   						}
   					?>
   				</tbody>
   			</table>
         </div>
   	</div>
   </div>
   <div class="col-md-4">
   	<div class="box box-danger">
   		<div class="box-header with-border text-center">
   			<h3 class="box-title"><b>Categorias listadas</b></h3>
   		</div>
   		<div class="box-body">
   			<table class="table table-bordered">
   				<thead>
   					<tr>
   						<th>Categoria</th>
   						<th width="50"></th>
   					</tr>
   				</thead>
   				<tbody id="tbl-subcat">
                  <tr>
                     <td>No hay categorias seleccionadas</td>
                     <td></td>
                  </tr>
   				</tbody>
   			</table>
            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-categorias" data-categoria="0" id="btn-subcat" style="visibility:hidden">Nueva</button>
         </div>
   	</div>
   </div>
   <div class="col-md-4">
   	<div class="box box-danger">
   		<div class="box-header with-border text-center">
   			<h3 class="box-title"><b>Subcategorias listadas</b></h3>
   		</div>
   		<div class="box-body">
   			<table class="table table-bordered">
   				<thead>
   					<tr>
   						<th>Subcategorias</th>
   						<th width="50"></th>
   					</tr>
   				</thead>
   				<tbody id="tbl-subcat2">
                  <tr>
                     <td>No hay subcategorias seleccionadas</td>
                     <td></td>
                  </tr>
   				</tbody>
   			</table>
            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-subcategorias" data-categoria="0" data-supercat="0" id="btn-subcat2" style="visibility:hidden">Nueva</button>
         </div>
   	</div>
   </div>
   <div class="clearfix"></div>
</section>
<!-- Modal registrar categorias -->
<div class="modal fade modal-danger" id="modal-categorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de registro de categorias</h4>
      </div>
       	<form method="post" enctype="multipart/form-data" id="form-save-subcat">
	       	<input type="hidden" name="id_cat" value="">
      		<div class="modal-body">
  				<div class="form-group">
                  	<label for="titulo">Nueva subcategoria</label>
                  	<select name="id_categoria" id="categoria-id" class="form-control">
                  		<?php
                  			foreach ($categorias as $val) {
                  				print('<option value="'.$val->getId().'">'.$val->getNombre().'</option>');
                  			}
                  		?>
                  	</select>
                </div>
  				<div class="form-group">
                  	<label for="titulo">Nueva subcategoria</label>
                  	<input type="text" class="form-control" name="sub_categoria" placeholder="Subcategoria">
                </div>
      		</div>
      		<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button type="button" class="btn btn-primary" id="btn-subcategoria-save">Guardar</button>
	      	</div>
  		</form>
    </div>
  </div>
</div>
<!-- Modal registrar subcategorias -->
<div class="modal fade modal-danger" id="modal-subcategorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de subcategorias</h4>
      </div>
       	<form method="post" enctype="multipart/form-data" id="form-save-subcat2">
	       	<input type="hidden" name="id_cat" value="">
      		<div class="modal-body">
     				<div class="form-group">
               	<label for="titulo">Super Categoria</label>
               	<select name="id_categoria" id="supercategoria-id" class="form-control">
               		<?php
               			foreach ($categorias as $val) {
               				print('<option value="'.$val->getId().'">'.$val->getNombre().'</option>');
               			}
               		?>
               	</select>
               </div>
     				<div class="form-group">
               	<label for="titulo">categoria</label>
                  <select name="id_subcategoria" id="subcategoria-id" class="form-control">

               	</select>
               </div>
               <div class="form-group">
               	<label for="titulo">subcategoria</label>
                  <input type="text" class="form-control" name="subcategoria" placeholder="Subcategoria">
               </div>
      		</div>
      		<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button type="button" class="btn btn-primary" id="btn-subcategoria-save2">Guardar</button>
	      	</div>
  		</form>
    </div>
  </div>
</div>

<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-footer.php'; ?>
