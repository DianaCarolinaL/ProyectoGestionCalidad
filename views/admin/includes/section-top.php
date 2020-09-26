<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administracion | Portal de Calidad del Programa de Ingeniería de Sistemas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../resource/css/jquery.jgrowl.min.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../resource/css/AdminLTE.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../resource/css/font-awesome.min.css">
  <!-- Skin for proyect  -->
  <link rel="stylesheet" href="../../resource/css/skin-red-light.min.css">
  <!-- Styles main -->
  <link rel="stylesheet" href="../../resource/css/admin/admin.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red-light fixed">
  <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="../../panel-admin/home/" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">SADIS</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="../../resource/img/avatar5.png" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs" style="text-transform: capitalize;"><?php print($_SESSION['admin']['nombre']) ?> </span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="../../resource/img/avatar5.png" class="img-circle" alt="User Image">

                      <p style="text-transform: capitalize;">
                        <?php print($_SESSION['admin']['nombre']) ?>
                        <small>Administrador</small>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-right">
                        <a href="../../panel-admin/close/" class="btn btn-default btn-flat">Cerrar Sesion</a>
                      </div>
                    </li>
                </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../resource/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="text-transform: capitalize;"><?php print($_SESSION['admin']['nombre']) ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="../../contenido/principal/"><i class="fa fa-home"></i> <span>HOME</span></a>
            </li>
            <?php
            foreach ($categorias as $cat) { ?>
               <?php if (!empty($cat->getSubCategorias())) {?>
               <li>
                  <a href="#" style="text-transform: uppercase;">
                     <i class="fa fa-file"></i> <span><?php print($cat->getNombre()); ?></span>
                     <?php if (!empty($cat->getSubCategorias())) {?>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     <?php } ?>
                  </a>
                  <?php $array = $cat->getSubCategorias(); ?>
                  <ul class="treeview-menu">
                  <?php foreach ($array as $val) {  
                     $sub = $val->getSubCategorias(); ?>
                     <li>                        
                        <?php if ($val->getId() == 7) { ?>
                           <a href="../../actores/<?php print(str_replace(" ", "_", strtolower($val->getNombre())) . '/' . $val->getId()); ?>"><i class="fa fa-circle-o text-red"></i> <span><?php print($val->getNombre()); ?></span>
                              <?php if (!empty($sub)) {?>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                              <?php } ?>
                           </a>
                        <?php } else { ?>
                           <a href="../../contenido/<?php print(str_replace(" ", "_", strtolower($val->getNombre())) . '/' . $val->getId()); ?>"><i class="fa fa-circle-o text-red"></i> <span><?php print($val->getNombre()); ?></span>
                              <?php if (!empty($sub)) {?>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                              <?php } ?>
                           </a>                           
                       <?php }                         
                        if (!empty($sub)) { ?>
                        <ul class="treeview-menu">
                           <?php foreach ($sub as $sb) {?>
                              <li>
                                 <a href="../../contenido/<?php print(str_replace(" ", "_", strtolower($sb->getNombre())) . '/' . $sb->getId()); ?>"><i class="fa fa-circle-o text-red"></i> <span><?php print($sb->getNombre()); ?></span></a>
                              </li>
                           <?php } ?>
                        </ul>
                        <?php } ?>
                     </li>
                  <?php } ?>
                  </ul>
               </li>
               <?php } ?>
            <?php } ?>
            <li>
                <a href="../../control/documentos/" style="text-transform: uppercase;">
                    <i class="fa fa-file"></i> <span>Control de Documento</span>
                </a>
            </li>
            <li>
                <a href="../../categorias/show/" style="text-transform: uppercase;">
                    <i class="fa fa-edit"></i> <span>agregar categoria</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
