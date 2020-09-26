<?php include VIEWSPATH. DS .'includes'. DS .'header.php'; ?>

<div class="container-fluid">
    <section class="content-header no-index" style="background-color: #FFF;">
        <div class="info-box" style="box-shadow: none;">
            <span class="info-box-icon"><i class="fa fa-address-book-o"></i></span>
            <div class="info-box-content">
                <h2 class="info-box-text"><b><?php print($titulo) ?></b></h2>
                <span class="info-box-number"><?php print($desc) ?></span>
            </div>
        </div>
        <section class="secciones">
	        <div class="box-body box box-solid">
	        	<?php 
	        	if (!empty($docentes)) {
	        		foreach ($docentes as $doc) {
			        	print('<div class="col-lg-4">
						  	<div class="contact-box text-center">
					          	<img width="70" alt="image" class="img-circle center-block img-responsive" src="../../uploads/personal/avatar/'.$doc["imagen"].'">
					          	<div class="m-t-xs font-bold ng-binding">'.$doc["cargo"].'</div>
						        <h4 style="overflow-wrap:break-word;"><strong class="ng-binding">'.$doc["nombre"]." ". $doc["apellidos"].'</strong></h4>
						        <h5 style="overflow-wrap:break-word;" class="ng-binding"><i class="fa fa-envelope-o"></i> '.$doc["email"].'</h5>
						  	</div>
						</div>');
					}
				} else {
					print('<h3 class="text-center">No existen docentes registrados</h3>');
				}?>
	        </div>           
	    </section>
    </section>    
</div>

<?php include VIEWSPATH. DS .'includes'. DS .'footer.php'; ?>