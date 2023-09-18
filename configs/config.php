<?php
	$host_mysql = "localhost";
    $user_mysql="root" ;
	$pass_mysql="" ;
	$db_mysql="formulario";

	$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql) or die ("Error al conectar al servidor");
?>