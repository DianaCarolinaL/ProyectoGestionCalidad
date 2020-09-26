<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-top.php'; ?>

<section class="content-header">
	<h1>Perfil del Docente</h1>
</section>
<section class="content">
	<!-- Your Page Content Here -->
	<div class="row">
		<div class="col-md-3">
          	<!-- Profile Image -->
          	<div class="box box-danger">
	            <div class="box-body box-profile">
	              	<img class="profile-user-img img-responsive img-circle" src="../../uploads/personal/avatar/<?php print($doc[0]->imagen) ?>" alt="User profile picture">
	              	<h3 class="profile-username text-center"><?php print($doc[0]->nombre.' '.$doc[0]->apellidos) ?></h3>
	              	<p class="text-muted text-center"><?php print($doc[0]->cargo); ?></p>
		            <ul class="list-group data-teacher" style="list-style: none;">
              			<li>
							<div class="icon-list-data">
								<i class="fa fa-address-card-o"></i>
							</div>
              				<div class="list-content">
              					<h4 class="no-margin"><b>Indentificación</b></h4>
              					<span><?php print(number_format($doc[0]->identificacion)); ?></span>
              				</div>
              			</li>		              				
              			<li>
							<div class="icon-list-data">
								<i class="fa fa-volume-control-phone"></i>
							</div>
              				<div class="list-content">
              					<h4 class="no-margin"><b>Telefono</b></h4>
              					<span><?php print($doc[0]->telefono); ?></span>
              				</div>
              			</li>
              			<li>
							<div class="icon-list-data">
								<i class="fa fa-envelope-o"></i>
							</div>
              				<div class="list-content">
              					<h4 class="no-margin"><b>Email</b></h4>
              					<span style="word-wrap: break-word;"><?php print($doc[0]->email); ?></span>
              				</div>
              			</li>
              		</ul>
	              	<a href="<?php print($doc[0]->url_cvlac); ?>" target="_blank" class="btn btn-danger btn-block"><b>VER CV-LAC</b></a>
	            </div>
	            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca del Docente</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección laboral</strong>
              <p class="text-muted"><?php print($doc[0]->dir_laboral) ?></p>
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Cargo Actual</strong>
              <p class="text-muted"><?php print($doc[0]->cargo) ?></p>
              <hr>
              <strong><i class="fa fa-graduation-cap margin-r-5"></i> Competencias</strong>
              <p class="text-muted"><?php print($doc[0]->competencias) ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-9">
	        <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              	<li class="active"><a href="#formacion" data-toggle="tab" aria-expanded="true">Formación Academica</a></li>
	              	<li class=""><a href="#proyectos" data-toggle="tab" aria-expanded="false">Proyectos realizados</a></li>
	              	<li class=""><a href="#actualizar" data-toggle="tab" aria-expanded="false">Actualizar Información</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="formacion">
	              		<div class="box-header">
	              			<h3 class="box-title" style="vertical-align:-webkit-baseline-middle;"><b>Formación Academica</b></h3>
			            	<button data-toggle="modal" data-target="#modal-update-est" data-whatever="register" data-doc="<?php print($doc[0]->id)?>" class="btn btn-danger pull-right">Agregar Formación</button>
			            </div>
			            <hr>
	                	<!-- estudios -->
	                	<?php  
	                	if (!empty($est)) {
	                		foreach($est as $e) {
			                	print('<div class="post">
				                  	<div class="user-block">
					                    <img src="../../resource/img/library.svg" alt="user image">
				                        <span class="username">
				                          <h4 class="no-margin text-red">'.$e->titulo.'</h4>
				                        </span>
				                    	<span class="description">'.$e->lugar.'</span>
				                    	<span class="description">'.$e->fecha_inicio.' hasta '.$e->fecha_fin.'</span>
				                  	</div>
				                  	<!-- /.user-block -->
				                  	<div style="margin-left: 48px;">
					                  	<p style="text-transform:uppercase;"><em>'.$e->tesis.'</em></p>	
					                  	<button data-id="'.$e->id.'" class="btn btn-danger btn-sm btn-delete-est"><i class="fa fa-trash"></i></button> 
					                  	<button data-toggle="modal" data-target="#modal-update-est" data-doc="'.$doc[0]->id.'" data-id="'.$e->id.'" data-title="'.$e->titulo.'" data-place="'.$e->lugar.'" data-date-ini="'.$e->fecha_inicio.'" data-date-fin="'.$e->fecha_fin.'" data-thesis="'.$e->tesis.'" class="btn btn-danger btn-sm btn-update-estudy"><i class="fa fa-refresh"></i></button>  
					                </div>            
			                	</div>');
			               	}
			            }?>			            
	              	</div>
					<div class="tab-pane" id="proyectos">
						<div class="box-header">
							<h3 class="box-title"><b>Trabajos Realizados</b></h3>	
							<button data-toggle="modal" data-target="#modal-update-proy" data-whatever="register" data-doc="<?php print($doc[0]->id)?>" class="btn btn-danger pull-right">Agregar Proyectos</button>						
						</div>
						<hr>
						<?php if (!empty($proyect)) {
							foreach ($proyect as $e) {							
								print('<div class="post">
				                  	<div class="user-block">
					                    <img src="../../resource/img/projects.svg" alt="user projects">
				                        <span class="username">
				                          <h4 class="no-margin text-red">'.$e->titulo.'</h4>
				                        </span>
				                    	<span class="description">'.$e->lugar.'</span>
				                    	<span class="description">'.$e->fecha.'</span>
				                  	</div>
				                  	<!-- /.user-block -->	
				                  	<div style="margin-left: 48px;">
				                  		<button data-id="'.$e->id.'" class="btn btn-danger btn-sm btn-delete-proy"><i class="fa fa-trash"></i></button> 
				                  		<button data-toggle="modal" data-target="#modal-update-proy" data-doc="'.$doc[0]->id.'" data-id="'.$e->id.'" data-title="'.$e->titulo.'" data-place="'.$e->lugar.'" data-date="'.$e->fecha.'" class="btn btn-danger btn-sm btn-update-estudy"><i class="fa fa-refresh"></i></button>
				                  	</div>              
			                	</div>');
			                }} else {
			                	print('No hay proyectos cargados');
			                }?>
						</div>
					<div class="tab-pane" id="actualizar">
						<div class="box-header">
							<h3 class="box-title"><b>Información Basica</b></h3>							
						</div>
						<hr>
						<div class="box-body">
							<form type="POST" enctype="multipart/form-data" id="form-update-per">
		                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
		                    <input type="hidden" value="<?php print($doc[0]->imagen); ?>" name="img_old">
		                    <input type="hidden" value="<?php print($doc[0]->id); ?>" name="id_old">
		                    <div class="row">
			                    <div class="col-md-6">
			                      	<div class="form-group">
			                        	<label for="inputName">Identificación</label>
			                          	<input type="text" class="form-control" name="id" placeholder="Identificación" value="<?php print($doc[0]->identificacion); ?>">
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputEmail">Nombre</label>
			                          	<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php print($doc[0]->nombre); ?>">
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputName">Apellidos</label>
			                          	<input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php print($doc[0]->apellidos); ?>">
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputName">Telefono</label>
			                          	<input type="tel" class="form-control" name="telefono" placeholder="Telefono" value="<?php print($doc[0]->telefono); ?>">
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputSkills">Email</label>
			                          	<input type="email" class="form-control" name="email" placeholder="Email" value="<?php print($doc[0]->email); ?>">
			                     	 </div>		                     	
			                      	<div class="form-group">
			                        	<label for="inputName">Imagen</label>
			                            <input type="file" class="form-control btn btn-danger" name="avatar""> 
			                      	</div>                      	
			                    </div>
			                    <div class="col-md-6">
			                      	<div class="form-group">
			                        	<label for="inputSkills">Cargo</label>
			                          	<input type="text" class="form-control" name="cargo" placeholder="Cargo" value="<?php print($doc[0]->cargo); ?>">	
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputSkills">Dirección Laboral</label>
			                          	<input type="text" class="form-control" name="dir_lab" placeholder="Direccion laboral" value="<?php print($doc[0]->dir_laboral); ?>">
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputName">URL CV</label>
			                            <input type="url" class="form-control" name="url" placeholder="URL CV-LAC" value="<?php print($doc[0]->url_cvlac); ?>"> 
			                      	</div>
			                      	<div class="form-group">
			                        	<label for="inputName">Competencias</label>
			                            <textarea class="form-control" name="competencias" rows="3" placeholder="Competencias"><?php print($doc[0]->competencias); ?></textarea> 
			                      	</div>
			                    </div>
			                </div>
			                <div class="box-footer text-right">
			                	<button type="button" class="btn btn-danger btn-lg" id="btn-update-per">Actualizar Información</button>
			                </div>
			            </form>
						</div>
					</div>
	            </div>
	            <!-- /.tab-content -->
	        </div>
	        <!-- /.nav-tabs-custom -->
	   	</div>
	</div>
</section>

<!-- Modal cargar archivos -->
	<div class="modal fade modal-danger" id="modal-update-est" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Formulario de carga de estudios</h4>
	      </div>
	       	<form id="form-update-est">
	       		<input type="hidden" name="id_est" value="" id="id_est">
	       		<input type="hidden" name="id_doc" value="" id="id_doc">
	       		<input type="hidden" value="" id="action">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-md-6">
	        				<div class="form-group">
	                        	<label for="inputName">Titulo</label>
	                          	<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Titulo obtenido">
	                      	</div>
	                      	<div class="form-group">
	                        	<label for="inputName">Fecha de Inicio</label>
	                          	<input id="fecha_inicio" type="date" class="form-control" name="fechaini">
	                      	</div>	                      	
	                    </div>
	                    <div class="col-md-6">
	                      	<div class="form-group">
	                        	<label for="inputName">Lugar</label>
	                          	<input id="lugar" type="text" class="form-control" name="lugar" placeholder="Lugar">
	                      	</div>
	                      	<div class="form-group">
	                        	<label for="inputName">Fecha Finalizacion</label>
	                          	<input id="fecha_fin" type="date" class="form-control" name="fechafin">
	                      	</div>
	                    </div>
	      			</div>
      				<div class="form-group">
                    	<label for="inputName">Tesis</label>
                      	<textarea id="tesis" type="text" class="form-control" name="tesis" placeholder="Tesis"></textarea>
                  	</div>
	      		</div>
	      		<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="button" class="btn btn-primary" id="btn-update-estudy">Actualizar</button>
		      	</div>
      		</form>	      	
	    </div>
	  </div>
	</div>

<!-- Modal actualizar proyectos -->
	<div class="modal fade modal-danger" id="modal-update-proy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Formulario de carga de proyectos</h4>
	      </div>
	       	<form id="form-update-proy">
	       		<input type="hidden" name="id_proy" value="" id="id_proy">
	       		<input type="hidden" name="id_doc" value="" id="id_doc">
	       		<input type="hidden" value="" id="action2">
	      		<div class="modal-body">
    				<div class="form-group">
                    	<label for="inputName">Titulo</label>
                      	<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Titulo">
                  	</div>
                  	<div class="form-group">
                    	<label for="inputName">Lugar</label>
                      	<input id="lugar" type="text" class="form-control" name="lugar" placeholder="Lugar">
                  	</div>
                  	<div class="form-group">
                    	<label for="inputName">Fecha</label>
                      	<input id="fecha" type="date" class="form-control" name="fecha">
                  	</div>
	      		</div>
	      		<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="button" class="btn btn-primary" id="btn-update-proy">Actualizar</button>
		      	</div>
      		</form>	      	
	    </div>
	  </div>
	</div>

<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-footer.php'; ?>