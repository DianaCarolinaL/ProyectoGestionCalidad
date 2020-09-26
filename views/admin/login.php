<!DOCTYPE html>
<html lang="es">

<head>
    <!--Metaetiqueta para el uso del conjunto de caracteres adecuado-->
    <meta charset="utf-8">
    <!--Metaetiqueta para corregir compatibilidad con navegador Microsft-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Metaetiqueta para la correcta visualización en dispositivos moviles-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <title>Departamento de sistemas e Informática UFPS</title>
    <!--Añada primero el estilo de la libreria (ufps.css o ufps.min.css) y luego sus estilos propios-->
    <link href="../resource/css/AdminLTE.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resource/bootstrap/css/bootstrap.min.css">
    <link href="../resource/css/main.css" rel="stylesheet">
    <!--Librerías para compatibilidad con versiones antiguas de Internet Explorer-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-red">
	<div class="login-box">
		<div class="login-logo">
			<a href="../">
				<img width="100" src="../resource/img/logo_ufps_blanco.png" alt="">
			</a>
		    <p class="no-margin"><b>Inicio de Sesión</b></p>
		</div>
		<div class="login-box-body">
		    <p class="login-box-msg">Ingrese su email y contraseña</p>
		    <form action="../panel-admin/home/" method="post" enctype="application/x-www-form-urlencoded">
		      <div class="form-group has-feedback">
		        <input type="email" name="email" class="form-control" placeholder="Email">
		        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		      </div>
		      <div class="form-group has-feedback">
		        <input type="password" name="pass" class="form-control" placeholder="Contraseña">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      </div>
		      <div class="form-group">
		          <button type="submit" class="btn btn-danger btn-block">Login</button>
		      </div>
		    </form>
		</div>
	</div>
	
</body>
</html>