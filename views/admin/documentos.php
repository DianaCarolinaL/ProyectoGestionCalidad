<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-top.php'; ?>
<section class="content-header no-index">
    <div class="info-box p-rel">
    	<span class="info-box-icon"><i class="fa fa-book"></i></span>
    	<div class="info-box-content">
          	<h2 class="info-box-text"><b>Control de Documentos</b></h2>
          	<span class="info-box-number">A continuación podra consultar el listado de los documentos cargados en el sistema</span>
        </div>
    </div>
</section>
<section class="content">
	<!-- Your Page Content Here -->
	<div class="box box-danger">
		<div class="box-header with-border text-center">
			<h3 class="box-title"><b>Listado de documentos</b></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
					<table id="example2" class="display table table-bordered table-striped dataTable" cellspacing="0" width="100%">
		                <thead>
		                	<tr>
			                  <th>Documento</th>
			                  <th style="width: 90px">Fecha Mod.</th>
			                  <th style="width: 100px">Expide</th>
			                  <th style="width: 5%;">Versión</th>
			                  <th style="width: 10%;">Estado</th>
			                  <th style="width: 5%;">Revisado</th>
			                  <th style="width: 5%;">Aprobado</th>
			                  <th style="width: 5%;">Acción</th>
		                	</tr>
		               	</thead>
		                <?php 
		                if (!empty($doc_control)) {
		                	foreach ($doc_control as $doc) {
		                		$apro = "NO";
		                		$rev = "NO";
		                		if ($doc->revisado) {
		                			$rev = "SI";
		                		}
		                		if ($doc->aprobado) {
		                			$apro = "SI";
		                		}
		                		print('<tr>
				                  <td>'.$doc->titulo.'</td>
				                  <td>'.$doc->fecha_modificacion.'</td>
				                  <td>'.$doc->expide.'</td>
				                  <td style="text-align: center;">'.$doc->version.'</td>
				                  <td style="text-align: center;">'.$doc->estado.'</td>
				                  <td style="text-align: center;"><span class="badge bg-blue">'.$rev.'</span></td>
				                  <td style="text-align: center;"><span class="badge bg-blue">'.$apro.'</span></td>
				                  <td style="text-align: center;">
				                  	<button data-id="'.$doc->id.'" data-name="'.$doc->documento.'" class="btn btn-danger btn-sm btn-delete-doc"><i class="fa fa-trash"></i></button>
				                  </td>
				                </tr>');
				            }
			            }?>
		              </tbody>
		            </table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include VIEWSPATH . DS .'admin'. DS .'includes'. DS .'section-footer.php'; ?>