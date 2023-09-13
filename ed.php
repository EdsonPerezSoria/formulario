<?php 
include "configs/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet"  href="style/css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>
</head>
<body>
    <form class="formulario" method="post">
    
        <p class="titulo">Sistema de Gestión de Seguridad de la Información</p>
        <div>
            <label>Empresa u Organización:</label>
            <input type="text" name="empresa">
        </div> 
        <br>   
        <div>
            <label>Objetivo de Seguridad:</label>
            <input type="text" name="objetivo">
        </div>
        <br>
        <div>
            <label>Cuestiones Internas:</label>
            <input type="text" name="internas">
        </div>
        <br>
        <div>
            <label>Cuestiones Externas:</label>
            <input type="text" name="externas">
        </div>    
        <br><br><BR></BR>
        <center>
        <button type="submit" name="enviar">Enter</button>
        <button type="submit" name="menu">Menu</button>
        <button type="reset" name="borrar">Borrar</button> <!--el tipo reset deja todo los valores iniciales, es decir, borra todos los inputs y los deja en blanco-->
        </center>
    </form>
</body>
</html>
<?php
$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);

if(isset($enviar)){
	$empresa = clear($empresa);
	$objetivo = clear($objetivo);
	$internas = clear($internas);
	$externas = clear($externas);
	

	mysqli_query($con,"INSERT INTO sistema (empresa,objetivo,internas,externas) VALUES ('$empresa','$objetivo','$internas','$externas')");

    
	alert("Te has registrado satisfactoriamente",'principal');

    
    redir("foda.php");
	//die();
	
   ?>
   <h1>$id</h1>
    <?php

}



if(isset($menu)){
    redir("menu.php");
}
/*se omite esto porque el type reset de boton reinicia todos los controles a sus valores iniciales
if(isset($borrar)){
	$empresa = clear($empresa);
	$objetivo = clear($objetivo);
	$internas = clear($internas);
	$externas = clear($externas);
	
}*/
?>