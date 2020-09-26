<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-top.php'; ?>
	<section class="content-header no-index">
      <div class="info-box">
      	<span class="info-box-icon"><i class="fa fa-address-book-o"></i></span>
      	<div class="info-box-content">
          	<h2 class="info-box-text"><b>Panel de Registro de Personal</b></h2>
          	<span class="info-box-number">A continuacion podra registrar el personal asociado al programa</span>
        </div>
      </div>
  </section>
  <!-- Main content -->
	<section class="content">
  	<!-- Your Page Content Here -->
  	<div class="box">
	    <div class="box-body" id="wizard">
	    	<h3>Informacion Basica</h3>
	    	<section>
	    		<form type="post" enctype="multipart/form-data" id="form-person">
               <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
               <div class="row">
                   <div class="col-md-6">
                    	<div class="form-group">
                      	<label for="inputName">Identificación</label>
                        	<input type="number" class="form-control" name="id" placeholder="Identificación">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputEmail">Nombre</label>
                        	<input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputName">Apellidos</label>
                        	<input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputName">Telefono</label>
                        	<input type="number" class="form-control" name="telefono" placeholder="Telefono">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputSkills">Email</label>
                        	<input type="email" class="form-control" name="email" placeholder="Email">
                   	 </div>
                    	<div class="form-group">
                      	<label for="inputName">Imagen</label>
                          <input type="file" class="form-control btn btn-danger" name="avatar">
                    	</div>
                   </div>
                   <div class="col-md-6">
                    	<div class="form-group">
                      	<label for="inputSkills">Cargo</label>
                        	<input type="text" class="form-control" name="cargo" placeholder="Cargo">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputSkills">Dirección Laboral</label>
                        	<input type="text" class="form-control" name="dir_lab" placeholder="Direccion laboral">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputName">URL CV</label>
                          <input type="url" class="form-control" name="url" placeholder="URL CV-LAC">
                    	</div>
                    	<div class="form-group">
                      	<label for="inputName">Competencias</label>
                          <textarea class="form-control" name="competencias" rows="3" placeholder="Competencias"></textarea>
                    	</div>
                   </div>
                </div>
	         </form>
	    	</section>
	    	<h3>Formacion Academica</h3>
	    	<section>
	    		<form id="form-formation-per">
               <div class="row" id="inputs-doc">
                 <div class="col-md-6">
    						<div class="form-group">
                    	<label for="inputName">Titulo</label>
                      	<input type="text" class="form-control" name="titulo" placeholder="Titulo obtenido">
                  	</div>
                  	<div class="form-group">
                    	<label for="inputName">Fecha de Inicio</label>
                      	<input type="date" class="form-control" name="fechaini">
                  	</div>
                  	<div class="form-group">
                    	<label for="inputName">Fecha Finalizacion</label>
                      	<input type="date" class="form-control" name="fechafin">
                  	</div>
                 </div>
                 <div class="col-md-6">
                  	<div class="form-group">
                    	   <label for="inputName">Lugar</label>
                      	<input type="text" class="form-control" name="lugar" placeholder="Lugar">
                  	</div>
                  	<div class="form-group">
                    	<label for="inputName">Tesis</label>
                      	<input type="text" class="form-control" name="tesis" placeholder="Tesis">
                  	</div>                      	
                 </div>
             </div>
            <div class="form-group">
            	<button type="button" id="btn-load-formation" class="btn btn-danger btn-lg">Agregar formación</button>
            </div>
          </form>
	    	</section>
         <h3>Proyectos Realizados</h3>
         <section>
            <form id="project-doc">
               <div class="form-group">
                  <label for="inputName">Título</label>
                  <input type="text" class="form-control" name="titulo" placeholder="Titulo">
               </div>
               <div class="form-group">
                  <label for="inputName">Lugar</label>
                  <input type="text" class="form-control" name="lugar" placeholder="Lugar">
               </div>
               <div class="form-group">
                  <label for="inputName">Fecha</label>
                  <input type="date" class="form-control" name="fecha" placeholder="Fecha">
               </div>
               <div class="form-group">
                  <button type="button" id="btn-load-project" class="btn btn-danger btn-lg">Agregar Proyecto</button>
               </div>
            </form>
         </section>
	    </div>
	  </div>
	</section>

<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-footer.php'; ?>
