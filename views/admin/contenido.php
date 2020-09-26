<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-top.php'; ?>
	<section class="content-header no-index">
        <div class="info-box">
        	<span class="info-box-icon"><i class="fa fa-address-book-o"></i></span>
        	<div class="info-box-content">
	          	<h2 class="info-box-text"><b><?php print($titulo); ?></b></h2>
	          	<span class="info-box-number"><?php print($subtitulo); ?></span>
	        </div>
        </div>
    </section>
  	<!-- Main content -->
  	<section class="content">
    	<!-- Your Page Content Here -->
    	<div class="box box-danger">
    		<div class="box-header with-border">
	          	<h3 class="box-title"><b>Formulario de <?php print($titulo); ?></b></h3>
	        </div>
	        <div class="box-body">	          	
	            <div class="col-md-5"> 
	            	<form enctype="multipart/form-data" method="post" id="form-category">
	            		<input type="hidden" name="MAX_FILE_SIZE" VALUE="2000000">
	            		<input type="hidden" value="<?php print($categoria);?>" id="type-category" name="categoria">
	            		<input type="hidden" value="<?php print($action);?>" id="type-action" >
              			<div class="form-group">
              				<label>Imagen actual</label>
              				<div class="img_secciones">
              					<img src="../../uploads/<?php print($contenido->imagen); ?>" alt="<?php print($contenido->desc_img);?>" id="img_principal">
              				</div>
		                  	<input class="btn btn-danger" type="file" id="image" name="archivo">
		                </div>  
		                <div class="form-group">
              				<label>Descripción de la imagen</label>
		                  	<input class="form-control" value="<?php print($contenido->desc_img); ?>" name="desc_img" type="text"  id="desc-img" placeholder="Ingrese breve descripcion" required>
		                </div>    
		               	<div class="form-group">
		                  	<label>Contenido</label>
		                  	<textarea class="form-control" rows="5" id="cont-category" name="texto" placeholder="Ingrese el contenido." required="true"><?php print($contenido->texto);?></textarea>
		                </div>
		                <div class="box-footer">
			                <button type="button" class="btn btn-danger" id="btn-category"><i class="fa fa-refresh"></i> Cargar Información</button>
			            </div>
			    	</form>
			    </div>
          		<div class="col-md-7">
					<table id="example" class="display table table-bordered table-striped dataTable" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>Documento</th>
				                <th style="width:30px;">Acción</th>
				            </tr>
				        </thead>
				        <tbody id="add-doc">
				        <?php 
				        //var_dump($contenido->docs);
				        if (isset($contenido->docs)) {	            
					        foreach ($contenido->docs as $value) { 	
					            print ('<tr>
					                <td>
					                	<h4>'.$value->titulo.'</h4>
					                	<span>'.$value->descripcion.'</span>
					                </td>
					                <td style="vertical-align: middle;text-align: center;">
					                	<button data-id="'.$value->id.'" data-name="'.$value->documento.'" class="btn btn-sm btn-danger btn-delete-doc" title="Eliminar">
					                		<i class="fa fa-trash"></i>
					                	</button>
					                </td>
					            </tr>');
					        } 
					    }?>
				        </tbody>
				    </table>
          		</div>  
	        </div>
    	</div>    	
  	</section>
  	<!-- /.content -->
  	<!-- Modal cargar archivos -->
	<div class="modal fade modal-danger" id="myModalArchivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Formulario para cargar documentos</h4>
	      </div>
	       	<form method="post" enctype="multipart/form-data" id="form-load-doc">
		       	<input type="hidden" name="MAX_FILE_SIZE" VALUE="5000000">
		       	<input type="hidden" name="id_cat" value="<?php print($contenido->id); ?>">
	      		<div class="modal-body">
	      			<div class="form-group">
	                  	<label for="titulo">Titulo del documento</label>
	                  	<input type="text" class="form-control" name="title_doc" id="titulo" placeholder="Ingrese el título">
	                </div>
	                <div class="form-group">
	                  	<label for="description">Descripcíon del documento</label>
	                  	<input type="text" class="form-control" name="desc_doc" id="description" placeholder="Ingrese una breve descripción del documento">
	                </div>
	                <div class="form-group">
	                  	<label for="exampleInputFile">Subir archivo</label>
	                  	<input class="btn btn-danger" name="file_doc" type="file" id="exampleInputFile">
	                </div>
	      		</div>
	      		<div class="modal-body">
      				<div class="form-group">
	                  	<label for="titulo">Expide</label>
	                  	<input type="text" class="form-control" name="expide_doc" placeholder="Expide el documento">
	                </div>
	                <div class="row">
	                	<div class="col-md-3 col-sm-6 col-xs-12">
		                	<div class="form-group">
			                  	<label for="titulo">Version</label>
			                  	<input type="text" class="form-control" name="version_doc" placeholder="Versión">
			                </div>
		                </div>
		                <div class="col-md-3 col-sm-6 col-xs-12">
		                	<div class="form-group">
			                  	<label for="titulo">Estado</label>
			                  	<input type="text" class="form-control" name="estate_doc" placeholder="Estado">
			                </div>
		                </div>
		                <div class="col-md-3 col-sm-6 col-xs-12">
		                	<div class="form-group">
			                  	<label for="titulo">Revisado</label>
			                  	<select class="form-control" name="rev_doc">
								  	<option value="0" selected="true">NO</option>
								  	<option value="1">SI</option>
								</select>
			                </div>
		                </div>
		                <div class="col-md-3 col-sm-6 col-xs-12">
		                	<div class="form-group">
			                  	<label for="titulo">Aprobado</label>
			                  	<select class="form-control" name="aprov_doc">
								  	<option value="0" selected="true">NO</option>
								  	<option value="1">SI</option>
								</select>
			                </div>
		                </div>
	                </div>
	      		</div>
	      		<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="button" class="btn btn-primary" id="btn-load-doc">Cargar Documento</button>
		      	</div>
      		</form>	      	
	    </div>
	  </div>
	</div>
	<!-- BTN floating modal -->
	<button class="btn btn-danger btn-fixed" data-toggle="modal" data-target="#myModalArchivos"><i class="fa fa-upload"></i></button>
	
<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-footer.php'; ?>