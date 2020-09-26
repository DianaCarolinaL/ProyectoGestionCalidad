<div class="container-fluid">
    <section class="content-header no-index">
        <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-address-book-o"></i></span>
            <div class="info-box-content">
                <h2 class="info-box-text"><b><?php print($titulo) ?></b></h2>
                <span class="info-box-number"><?php print($desc) ?></span>
            </div>
        </div>
    </section>
    <section class="content secciones">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-7">
            <?php if (!empty($seccion)) { ?>
                <div class="img-section">
                    <img class="img-responsive" src="../../uploads/<?php print($seccion['imagen']); ?>" alt="<?php print($seccion['desc_img']); ?>">
                </div>
                <p><?php print($seccion['texto']); ?></p>
            <?php } else { ?>
                <h3>No hay informacion registrada</h3>
            <?php } ?>
            </div>
            <div class="col-md-5">
                <div class="box box-danger">
                    <div class="box-header text-center">
                        <h3 class="box-title"><b>Listado de Documentos</b></h3>                        
                    </div>
                    <div class="box-body">
                        <table id="example3" class="display table dataTable">
                            <thead>
                                <tr><th></th><th></th></tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($docs)) {
                                foreach ($docs as $d) {?>
                                <!-- item -->
                                <tr>
                                    <td>
                                        <img width="50" src="../../resource/img/docs.svg" alt="Product Image">
                                    </td>
                                    <td>
                                        <p class="text-red no-margin"><?php print($d['titulo']) ?>
                                            <a href="../../uploads/documentos/<?php print($d['documento']) ?>" class="btn btn-danger btn-sm pull-right" target="_blank"><i class="fa fa-download"></i></a>
                                        </p>
                                        <span><?php print($d['descripcion']) ?></span>
                                    </td>
                                </tr>
                            <?php }
                            } else {?>
                                <tr><td class="text-center" colspan="2">No hay documentos cargados</td></tr>
                            <?php } ?>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>            
    </section>
</div>



