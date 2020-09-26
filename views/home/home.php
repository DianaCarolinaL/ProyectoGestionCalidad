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
    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/AdminLTE.min.css" >
    <link rel="stylesheet" href="resource/css/font-awesome.min.css">
    <link rel="stylesheet" href="resource/css/main.css">
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
                                <li><a href="login/"><i class="fa fa-sign-in"></i> Login</a></li>
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
                        <a href="./">
                            <img id="logo-header" src="resource/img/logo_sistemas_top.png" alt="Logo Programa de Ingeniería de Sistemas" style="max-height:180px;">
                        </a>
                    </div>
                    <div class="col-md-2 col-ms-1 col-xs-2 pull-right">
                        <a href="http://www.ufps.edu.co/">
                            <img class="header-banner" src="resource/img/logo_ufps.png" style="max-height:160px;" alt="Escudo de la Universidad Francisco de Paula Santander"></a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar bg-nav-ufps" style="border-radius: 0;">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="./">Inicio </a></li>
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
                                             <a href="docentes/show/"><?php print($sub->getNombre()) ?>
                                                <?php if (!empty($subCat)) {?>
                                                   <span class="pull-right-container">
                                                      <i class="fa fa-angle-right pull-right"></i>
                                                   </span>
                                                <?php } ?>
                                             </a>                                          
                                       <?php } else { ?>
                                          <a href="view/<?php print(str_replace(" ", "_", strtolower($sub->getNombre()))); ?>/<?php print($sub->getId()) ?>">
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
                                                      <a href="view/<?php print(str_replace(" ", "_", strtolower($val->getNombre()))); ?>/<?php print($val->getId()) ?>">
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
    <main>
        <div class="container" style="background-color: #FFF;">
            <img src="resource/img/logo_sistemas_top.png" alt="" class="center-block">
        	<h3 class="text-center">Sistema para la Administración Documental de Ingenieria de Sistemas (SADIS)</h3> 
            <p>El Programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander recibió licencia de funcionamiento emanada del ICFES según el Acuerdo 277 de 19 diciembre de 1985 y fue aprobado mediante Resolución No. 001791 de Julio de 1991, emanada del Instituto Colombiano de Fomento de la Educación Superior ICFES. Se encuentra debidamente registrado en el Sistema Nacional de Información de dicha Entidad con el No. 120940030000055400111100.</p>
            <p>Según Acuerdo 045 de Julio 15 de 1996 del Consejo Superior de la UFPS se renovó la aprobación para el Programa. En el año 2005 se obtuvo registro calificado por 7 Años. En el año 2012 se obtuvo la renovación del registro calificado por 7 años, mediante la Resolución No. 10178 del 06 de septiemebre de 2012 del M.E.N.</p>
            <table class="table table-bordered" style="margin: auto; width: 70%;">
                <tbody>
                <tr>
                <td style="width: 40.4201%; text-align: justify;">Nombre del Programa:</td>
                <td style="width: 117.58%;">Ingeniería de Sistemas</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Lema:</td>
                <td style="width: 117.58%;">"Educación y Tecnología con Compromiso Social"</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Acta de creación:</td>
                <td style="width: 117.58%;">Acuerdo 277 de 19 diciembre de 1985</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Aprobación:</td>
                <td style="width: 117.58%;">Resolución No. 001791 de Julio de 1991</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Área del conocimiento:</td>
                <td style="width: 117.58%;">Ingeniería</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Núcleo básico de Conocimiento:</td>
                <td style="width: 117.58%;">Ingeniería de Sistemas, Telemática y afines</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Nivel de Formación:</td>
                <td style="width: 117.58%;">Universitario</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Duración:</td>
                <td style="width: 117.58%;">10 semestres</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Modalidad:</td>
                <td style="width: 117.58%;">Presencial Diurno</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Título obtenido:</td>
                <td style="width: 117.58%;">Ingeniero de Sistemas</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Tiempo de funcionamiento:</td>
                <td style="width: 117.58%;">30 Años</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Resolución:</td>
                <td style="width: 117.58%;">No. 10178 del 06 de septiembre de 2012 M.E.N</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Renovación:</td>
                <td style="width: 117.58%;">Acuerdo 045 de Julio 15 de 1996 del Consejo Superior de la UFPS</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Registro Calificado:</td>
                <td style="width: 117.58%;">Año 2012 vigencia por 7 Años.</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Acreditación de Alta Calidad:</td>
                <td style="width: 117.58%;">Resolución 15757 del MEN por un período de cuatro años.</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Código SNES:</td>
                <td style="width: 117.58%;">856</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Créditos Académicos</td>
                <td style="width: 117.58%;">164</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Director:</td>
                <td style="width: 117.58%;">MSc. I.S. Oscar Alberto Gallardo P.</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Ubicación:</td>
                <td style="width: 117.58%;">Edificio Aulas Sur, Bloque A, Piso 4</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Teléfono:</td>
                <td style="width: 117.58%;">5776655 Ext 201 - 203 o Línea directa 5751359</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">E-mail:</td>
                <td style="width: 117.58%;">ingsistemas@ufps.edu.co</td>
                </tr>
                <tr>
                <td style="width: 40.4201%;">Proyecto Educativo del Programa</td>
                <td style="width: 117.58%;">PEP 2012</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
	<footer>
    <div class="footer-cont">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-3 col-sm-4 md-margin-bottom-40">
                  <div class="footer-main">
                    <a href="http://ingsistemas@ufps.edu.co"><img width="200" id="logo-footer" class="img-responsive" src="resource/img/logo_ingsistemas_vertical_invertido.png" alt="Logo Pie de Página"></a>
                  </div>
                </div><!--/col-md-3-->
                <!-- End About -->
                <!-- Latest -->
            <div class="col-md-3 col-sm-4 md-margin-bottom-40">
              <div class="posts">
                <div class="headline"><h2>Visitantes</h2></div>
                <ul class="list-unstyled latest-list">
                  <li style="color:#fff">
                    Hoy: 152                  </li>
                  <li style="color:#fff">
                    Último mes: 4.273                  </li>
                  <li style="color:#fff">
                    Desde el principio: 18.084                  </li>
                </ul>
              </div>
            </div><!--/col-md-3-->
            <!-- End Latest -->
            <!-- Link List -->
            <div class="col-md-3 col-sm-4  md-margin-bottom-40">
              <div class="headline"><h2>Enlaces de Interés</h2></div>
              <ul class="list-unstyled latest-list">
                <li><a href="javascript:;">Sitio Web-Departamento de Sistemas</a></li>
                <li><a href="http://biblioteca.ufps.edu.co" target="_blank">Biblioteca Eduardo Cote Lamus</a></li>
                <li><a href="http://200.93.148.47/bienestar/" target="_blank">Vicerrectoría de Bienestar Universitario</a></li>
                <li><a href="./index.php?id=27">Cronograma del Comité Curricular</a></li>
                <li><a href="http://php.net/" target="_blank">Recursos PHP</a></li>
                <li><a href="https://www.facebook.com/IngSistUFPS/?fref=ts">Facebook</a></li>
                <li><a href="http://200.93.148.29/">Ir a versión Anterior</a></li>
              </ul>
            </div><!--/col-md-3-->
            <!-- End Link List -->
            <!-- Address -->
            <div class="col-md-3 col-sm-4  map-img md-margin-bottom-40">
              <div class="headline" style="border-bottom: #272727;"><h2>Contactos</h2></div>
              <address class="md-margin-bottom-40">
                Programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander<br>Acreditación de alta calidad según resolución No. 15757 del Ministerio de Educación Nacional<br>Avenida Gran Colombia No. 12E-96 Barrio Colsag, Cúcuta, Colombia<br>Teléfono (57) 7 5776655 Extensiones 201 y 203<br>Correo electrónico: ingsistemas@ufps.edu.co              </address>
            </div><!--/col-md-3-->
            <!-- End Address -->
          </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <p>
                    <?php print(date('Y')) ?> © All Rights Reserved.
                    Desarrollado por: <a href="#">Jefferson Bahamon - Andres Parra - Wilermer Gelves - Jhon Ibarra</a>
                  </p>
                </div>
                <!-- Social Links -->
                <div class="col-md-4">
                  <ul class="list-inline dark-social pull-right space-bottom-0">
                    <li>
                      <a href="https://www.facebook.com/UFPS-C%C3%BAcuta-553833261409690" target="_blank"><i class="fa fa-facebook" style="color:#fff;"></i></a>
                    </li>
                    <li>
                      <a href="https://twitter.com/UFPSCUCUTA" target="_blank"><i class="fa fa-twitter" style="color:#fff;"></i></a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2" target="_blank"><i class="fa fa-youtube" style="color:#fff;"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/ufpscucuta/" target="_blank"><i class="fa fa-instagram" style="color:#fff;"></i></a>
                    </li>
                  </ul>
                </div>
                <!-- End Social Links -->
            </div>
        </div>
  </div>
</footer>
<script src="resource/js/jquery-2.2.3.min.js"></script>
<script src="resource/bootstrap/js/bootstrap.min.js"></script>
<script>
  $("body").on("mouseenter", ".navbar-nav .dropdown-submenu", function(e) {
      $(this).addClass("open");
    });

    $("body").on("mouseleave", ".navbar-nav .dropdown-submenu", function(e) {
      $(this).removeClass("open");
    });
</script>
</body>
</html>
