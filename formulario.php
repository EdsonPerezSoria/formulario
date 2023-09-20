<?php 
include "configs/config.php";
include "configs/funciones.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EVENT</title>
</head>
<body>
	<center>
	<h1> Formulario </h1>
	</center>
Bienvenido : <?php echo $_SESSION['username']; ?>

<p> Ingresa los siguientes datos </p>
<br><br>
<form method="POST">
<center>
Proveedor
<input type="text" name="proveedor" placeholder="Proveedor" required> </input>


Factura: 
   <select name="color" required>
     <option></option>	
     <option>si</option>
     <option>no</option>
   </select>

<input type="text" name="fiscal" placeholder="Folio Fiscal" required> </input>

Breve descripcion del gasto:
<input type="text" name="descripcion" placeholder="descripcion" required> </input>

Descripcion del gasto:
<select name="gasto" required>
     <option></option>
     <option>Mobiliario</option>
     <option>Otros Gastos</option>
	 <option>Papeleria</option>
	 <option>Placas y Tenencia</option>
	 <option>Recoleccion Basura</option>
	 <option>Alimentos</option>
	 <option>Pasajes</option>
	 <option>Hospedaje</option>
   </select>

Centro de negocio:
<select name="negocio" required>
     <option></option>
     <option>Aeropuerto</option>
     <option>Bajio</option>
	 <option>Crédito y Cobranza</option>
	 <option>Cuernavaca</option>
	 <option>JTI</option>
	 <option>León</option>
	 <option>Querétaro</option>
	 <option>Staff</option>
	 <option>Toluca</option>
   </select>
<br><br> <br> <br>

total:
<input type="text" name="total" placeholder="total" id="total" required> </input>


<br><br>
<button type="submit" name="enviar">enviar</button>
</center>
</form> 
</body>
</html>

<?php
$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);
if(isset($_POST['enviar'])){
	$proveedor = $_POST ['proveedor'];
	$color = $_POST ['color'];
	$fiscal = $_POST ['fiscal'];
	$descripcion = $_POST ['descripcion'];
	$gasto = $_POST ['gasto'];
	$negocio = $_POST ['negocio'];
	$total = $_POST ['total'];
	
	$sub= $total /1.16;
	$iva= $total - $sub;

	date_default_timezone_set("America/Mexico_City");

	$fecha=date("d-m-Y");

	$insertar = "INSERT INTO form (provedor,color,fiscal,descripcion,gasto,negocio,sub,iva,total,fecha) VALUES ('$proveedor','$color','$fiscal','$descripcion','$gasto','$negocio','$sub',$iva,'$total','$fecha')";

    $ejecutar= mysqli_query ($con,$insertar);
 }
?>

