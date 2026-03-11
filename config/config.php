<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');//Usuario de tu base de datos
	define('DB_PASS', '123456789-');//Contraseña del usuario de la base de datos
	define('DB_NAME', 'parametros_balanza');//Nombre de la base de datos


	$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos s! </h2>".mysqli_error($con));
    }else{
		if (!$con->set_charset("utf8")) {
		//	@die("<h2 style='Error al cargar el conjunto de caracteres utf8: %s\n</h2>");
		
		} else {
			
		//	@die("<h2 style='text-align:center'>Conjunto de caracteres actual: %s\n</h2>");
		}

	}


	
    if (@mysqli_connect_errno()) {
        @die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>