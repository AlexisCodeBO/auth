<?php

include('../controladores/auth.php');


$auth = new authCtrl;

if(!$auth->esta_logueado())
  $auth->redir_to_login();  // si no esta logueado lo mandamos a la pagina de login 

      //validamos si tiene permisos para esta vista 
    
    if(!$auth->validar_permisos('home', 'r')) // r es lectura 
    	die('no autorizado');

	  //si necesitamos validar lectura y escritura lo hacemos asi 
	  //  $auth->validar_permisos('home');
 	  // los permisos son un JSON String salvado en el campo Permisos de la tabla
	  // usuarios. Ej.

	  // {'home' : {'r' : true , 'w' : false}, 'usuarios' : {'r':true , 'w' : true}}
	  //  'home' : {'r' : true , 'w' : false}  -> home es el nombre del modulo


?>

<html>
   <head>
     <title>Mi app - Home</title>
     <link rel="stylesheet" href="../libs/normalize-css/normalize.css">
     <link rel="stylesheet" href="../libs/bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../recursos/css/estilo.css">
   </head>
   <body>

   	<div class='container w8'>
              	<br>
              	<br>
              	<br>
              	<br>

   	<div class="to-center w6 tlc to-center">
   		<p>
       Bienvenido, <strong><?php echo $_GET['usr']; ?></strong>&nbsp;&nbsp;<a href='salir'>Salir</a>
       <br>  	      	
       <br> 
       Usuario:  <?php echo $_GET['uid']; ?>	      	
       <br>  	      	
       <br>  	      	
       Token: 
       <br>
       <br>
       <input type="text" value="<?php echo $_GET['token']; ?>" class="input-big wfull">
       <br>
       <br>
       El token nos sirve dado el caso de que necesitemos usar el server como un REST API. En ese caso debemos hacer todos los request pasando como parametros el token y el usuario.
       </p>
     </div>
 </div>

   </body>
</html>