<!DOCTYPE html>
<html lang="es">
<head>
    <!--Metaetiqueta para el uso del conjunto de caracteres adecuado-->
    <meta charset="utf-8">
    <!--Metaetiqueta para corregir compatibilidad con navegador Microsft-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Metaetiqueta para la correcta visualización en dispositivos moviles-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <title>Portal de Calidad | Programa Ingenieria de Sistemas</title>
    <!--Añada primero el estilo de la libreria (ufps.css o ufps.min.css) y luego sus estilos propios-->
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/css/AdminLTE.min.css" >
    <link rel="stylesheet" href="../../resource/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/css/main.css">
    <!--Librerías para compatibilidad con versiones antiguas de Internet Explorer-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #ecf0f5;">
    <header>
        <div id="barra-superior" class="bg-red-ufps">
            <div class="blog-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-xs-7">
                            <ul class="topbar-list topbar-menu">
                                <li><a href="/universidad/perfiles/aspirantes/952"><i class="fa fa-users"></i> Aspirantes</a></li>
                                <li><a href="/universidad/perfiles/estudiantes/953"><i class="fa fa-user"></i> Estudiantes</a></li>
                                <li><a href="/universidad/perfiles/egresados/954"><i class="fa fa-graduation-cap"></i> Graduados</a></li>
                                <li><a href="https://docentes.ufps.edu.co/"><i class="fa fa-user-secret"></i> Docentes</a></li>
                                <li><a href="http://nomina.ufps.edu.co:9191/nominaufps"><i class="fa fa-briefcase"></i> Administrativos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-5">
                            <ul class="topbar-list topbar-menu pull-right">
                                <li><a href="../../login/"><i class="fa fa-sign-in"></i> Login</a></li>
                            </ul>
                        </div>
                    </div><!--/end row-->
                </div><!--/end container-->
            </div>
            <!-- End Topbar blog -->
        </div>
        <div class="bg-img-ufps">
            <div class="parallax">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-5">
                        <a href="../../">
                            <img id="logo-header" src="../../resource/img/logo_sistemas_top.png" alt="Logo Programa de Ingeniería de Sistemas" style="max-height:180px;">
                        </a>
                    </div>
                    <div class="col-md-2 col-ms-1 col-xs-2 pull-right">
                        <a href="http://www.ufps.edu.co/">
                            <img class="header-banner" src="../../resource/img/logo_ufps.png" style="max-height:160px;" alt="Escudo de la Universidad Francisco de Paula Santander"></a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar bg-nav-ufps" style="border-radius: 0;">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../../">Inicio </a></li> 
                        <?php if (!empty($categorias)) {                         
                           foreach ($categorias as $cat) { ?>
                              <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php print($cat->getNombre()) ?>
                                    <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                 <?php $subcat = $cat->getSubCategorias();
                                    foreach ($subcat as $sub) { 
                                       $subCat = $sub->getSubCategorias(); ?>
                                       <li class="dropdown-submenu">
                                       <?php if ($sub->getId() == 7) { ?>
                                             <a href="../../docentes/show/"><?php print($sub->getNombre()) ?>
                                                <?php if (!empty($subCat)) {?>
                                                   <span class="pull-right-container">
                                                      <i class="fa fa-angle-right pull-right"></i>
                                                   </span>
                                                <?php } ?>
                                             </a>                                          
                                       <?php } else { ?>
                                          <a href="../../view/<?php print(str_replace(" ", "_", strtolower($sub->getNombre()))); ?>/<?php print($sub->getId()) ?>">
                                             <?php print($sub->getNombre()) ?>
                                             <?php if (!empty($subCat)) {?>
                                                <span class="pull-right-container">
                                                   <i class="fa fa-angle-right pull-right"></i>
                                                </span>
                                             <?php } ?>
                                          </a>                                          
                                       <?php } ?>
                                          <?php if (!empty($subCat)) {?>
                                             <ul class="dropdown-menu" role="menu">
                                                <?php foreach ($subCat as $val) { ?>
                                                   <li>
                                                      <a href="../../view/<?php print(str_replace(" ", "_", strtolower($val->getNombre()))); ?>/<?php print($val->getId()) ?>">
                                                         <?php print($val->getNombre()) ?>
                                                      </a>
                                                   </li>
                                                   <li class="divider"></li>   
                                                <?php } ?>
                                             </ul>
                                          <?php } ?>
                                       </li>
                                       <li class="divider"></li>                                
                                    <?php } ?>
                                 </ul>
                              </li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>