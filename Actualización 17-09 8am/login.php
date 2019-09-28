<?php

  $mensajeError= "";

  if ($_POST) {

    $password= password_hash($_POST["password"], PASSWORD_DEFAULT);

    $archivo="usuarios.json";
    $contenidoArchivo= file_get_contents($archivo);

     //convertilo en array
     $datos=json_decode($contenidoArchivo, true);

     if(!$datos){
       $datos=[];
     }

     $retorno=null;

     foreach ($datos as $user) {
       // Por cada usuario preguntar
       if($user["email"]==$_POST["email"]){
         //Si la condicion da verdadera retornar usuario
         $retorno=$user;
         break;
       }
     }

     //agregarle los datos del nuevo usuario
     if(!$retorno){
     $datos[]= [
           "email" => $_POST["email"],
          "password" => $password
        ];

        //al array final lo codifico de nuevo en json
        $json=json_encode($datos);

        //grabar los nuevos datos en el mismo archivo
        file_put_contents($archivo, $json);

      }else{
        $mensajeError="El usuario ya existe";
      }

  }
?>








<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>Secondary Expandable Menu</title>
</head>
<body>
	<header>
		<a id="cd-logo" href="index.html"><img src="img/logo.png" alt="Homepage"></a>
		<nav id="cd-top-nav">
			<ul>
				<li><a href="#0">Home</a></li>
				<li><a href="#0">Login</a></li>
			</ul>
		</nav>
		<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>
	</header>
	<main class="cd-main-content">
		<section class="form-container">
			<h2>Login</h2>
			<h5 class="reg-info">Ingrese con su nombre de usuario y contraseña</h5>
			<form class="access-form" action="" method="post">
				<div class="field-group">
					<label for="email">E-mail</label>
					<br>
					<span class="input-item">
						<i class="fa fa-user-circle"></i>
					</span>
					<input type="email" id="email" name="email" placeholder="e-mail" value="" required style="font-family: segoe script;">
				</div>
				<div class="field-group">
					<label for="password">Contraseña</label>
					<br>
					<span class="input-item">
					 <i class="fa fa-key"></i>
					</span>
					<input type="password" id="passsword" name="password" placeholder="password" value="" required style="font-family: segoe script;">
				</div>
				<div class="field-group remember-me">
					<input type="checkbox" id="remember-me" name="remember-me" value="">
					<label for="remember-me">Recordarme</label>
				</div>
				<p class="form-text alert-hide">
					La combinación ingresada de email y contraseña no es válida.
				</p>
				<br>
				<button type="submit" name="send">Ingresar</button>
				<br>
				<br>
				<div class="other">
					 <button class="btn btn-outline-dark">¿Olvidaste tu contraseña?</button>
					 <button class="btn btn-info">Registrese!
					 <i class="fa fa-user-plus" aria-hidden="true"></i>
					 </button>
				</div>
				<br>
				<br>
			</form>
		</section>
	</main>
	<nav id="cd-lateral-nav">
		<ul class="cd-navigation">
			<li class="item-has-children">
				<a href="#0">Productos</a>
				<ul class="sub-menu">
					<li><a href="#0">1</a></li>
					<li><a href="#0">2</a></li>
					<li><a href="#0">3</a></li>
					<li><a href="#0">4</a></li>
					<li><a href="#0">5</a></li>
				</ul>
			</li>
		</ul>

		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="#0">Login</a></li>
			<li><a href="#0">Registrarse</a></li>
			<li><a href="#0">Preguntas Frecuentes</a></li>
			<li><a href="#0">Contacto</a></li>
		</ul>


		<div class="cd-navigation socials">
			<a class="cd-twitter cd-img-replace" href="#0">Twitter</a>
			<a class="cd-facebook cd-img-replace" href="#0">Facebook</a>
  		</div>
	</nav>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
