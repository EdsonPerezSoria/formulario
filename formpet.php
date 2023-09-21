<?php
session_start();
if(!isset($_SESSION['username'])){	
  header('location:https://mi-info.com/');
  }
  $usuario = $_SESSION['username'];
include "configs/config.php";
include "configs/funciones.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<link rel="stylesheet"  href="style/css/estilos.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Ventas</title>
	<script type="text/javascript">
		function anular(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        return (tecla != 13);
    	}
	</script>
</head>
<body style="background-color:rgb(163, 238, 234)">
	<center><img src="style\imagenes\logo.png" >
			<h1>Formulario de Reembolso</h1>
			Hola  <?php echo $_SESSION['username']; ?>   ingresa los siguientes datos para solicitar tu reembolso<br><br>
	</center>
	<form class="peticiones" method="POST" onkeypress="return anular(event)">
	
		<center>
		<div >
                    <div class="cuadros1_pet">
						<label class="etiquetas_pet">Proveedor:</label>
                        <label class="etiquetas_pet" >Factura:</label> 
                        <label class="etiquetas_pet">Folio Fiscal:</label>
                        </div>
                        <br>
                    <div class="cuadros1_pet">
                        <input class="cuadros1_pet" id="proveedor" name="proveedor" placeholder="Proveedor">
                        <select class="cuadros1_pet" name="factura">
							<option hidden selected>Selecciona una opción</option>	
     						<option>si</option>
     						<option>no</option>
   						</select>
                        <input class="cuadros1_pet" type="text" name="fiscal" placeholder="Folio Fiscal">
                    </div>    
                        
        </div>
		</center>                    
        <br>
        <br>

		<center>
		<div >
                    <div class="cuadros1_pet">
						<label class="etiquetas_pet">Breve descripcion del gasto:</label>
                        <label class="etiquetas_pet" >Descripcion del gasto:</label> 
                        <label class="etiquetas_pet">Centro de negocio:</label>
                        </div>
                        <br>
                    <div class="cuadros1_pet">
                        <input class="cuadros1_pet" type="text" id="breve" name="breve" placeholder="Descripcion del trabajo">
                        <select class="cuadros1_pet" name="descripcion" >
							<option hidden selected>Selecciona una opción</option>
     						<option>Mobiliario</option>
     						<option>Otros Gastos</option>
	 						<option>Papeleria</option>
	 						<option>Placas y Tenencia</option>
	 						<option>Recoleccion Basura</option>
	 						<option>Alimentos</option>
	 						<option>Pasajes</option>
	 						<option>Hospedaje</option>
   						</select>
						   <select class="cuadros1_pet" name="negocio" >
						   <option hidden selected>Selecciona una opción</option>
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
                    </div>    
                        
        </div>
		</center>                    
        <br>
        <br>

		<center>
                    <div class="cuadros1_pet">
						<label class="etiquetas_pet">Total:</label>
                    </div>
                        <br>
                    <div class="cuadros1_pet">
                        <input class="cuadros2_pet" type="text" id="total" name="total" placeholder="Total">
                    </div>    
		</center>  

		<br><br><br>
         <div class="botonespet">
                <button type="submit" name="regresar">Regresar</button>
                <button type="submit" name="enviar">Enviar</button>
                <button type="submit" name="solicitudes">Solicitudes</button>
		</div>  
	</form>
	
</body>
</html>

<?php
$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);
if(isset($_POST['enviar'])){
	$usuario= $_SESSION['username'];
	$proveedor = $_POST ['proveedor'];
	$factura = $_POST ['factura'];
	$fiscal = $_POST ['fiscal'];
	$breve = $_POST ['breve'];
	$descripcion = $_POST ['descripcion'];
	$negocio = $_POST ['negocio'];
	$total = $_POST ['total'];
	$sub= $total /1.16;
	$iva= $total - $sub;

	date_default_timezone_set("America/Mexico_City");

	$fecha=date("d-m-Y");
	$hora=date(" h:i:s a");
	

	$insertar = "INSERT INTO formpet (usuario,proveedor,factura,folio_fiscal,breve_descripcion,descripcion_gasto,centro_negocios,sub_total,iva,total,hora,fecha) VALUES 
	('$usuario','$proveedor','$factura','$fiscal','$breve','$descripcion','$negocio','$sub','$iva','$total','$hora','$fecha')";

    $ejecutar= mysqli_query ($con,$insertar);

	alert("Registro exitoso");

}

if(isset($_POST['solicitudes'])){
	header("location: solicitudes.php");
}

if(isset($_POST['regresar'])){
	header("location: index.php");
}

?>