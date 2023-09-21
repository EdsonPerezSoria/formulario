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
		function calcularTotal() {
			var venta_neta = parseFloat(document.getElementById("venta_neta").value);
            var dummy = parseFloat(document.getElementById("dummy").value);
			var total_liquidar = venta_neta + dummy;
			document.getElementById("total_liquidar").value = total_liquidar.toFixed(2);
		
			var atm = parseFloat(document.getElementById("atm").value);
			var billetes = parseFloat(document.getElementById("billetes").value);
            var monedas = parseFloat(document.getElementById("monedas").value);
			var total_efectivo = atm + billetes + monedas;
			document.getElementById("total_efectivo").value = total_efectivo.toFixed(2);
		
			var total_efectivo = parseFloat(document.getElementById("total_efectivo").value);
            var transferencia = parseFloat(document.getElementById("transferencia").value);
			var cheque = parseFloat(document.getElementById("cheque").value);
			var total_de_valores_recibidos = total_efectivo + transferencia + cheque;
			document.getElementById("total_de_valores_recibidos").value = total_de_valores_recibidos.toFixed(2);
		
			var total_liquidar = parseFloat(document.getElementById("total_liquidar").value);
            var pago_rutas_que_no_llegan = parseFloat(document.getElementById("pago_rutas_que_no_llegan").value);
			var pago_de_créditos = parseFloat(document.getElementById("pago_de_créditos").value);
			var faltante_del_chofer = parseFloat(document.getElementById("faltante_del_chofer").value);
			var faltante_por_robo = parseFloat(document.getElementById("faltante_por_robo").value);
			var faltante_x_nota_de_crédito = parseFloat(document.getElementById("faltante_x_nota_de_crédito").value);
			var faltante_rutas_que_no_llegan = parseFloat(document.getElementById("faltante_rutas_que_no_llegan").value);
			var créditos_otorgados = parseFloat(document.getElementById("créditos_otorgados").value);

			//var diferencia = total_liquidar + pago_rutas_que_no_llegan + pago_de_créditos -total_efectivo - transferencia - cheque - faltante_del_chofer - faltante_por_robo - faltante_x_nota_de_crédito - faltante_rutas_que_no_llegan - créditos_otorgados;
			var diferencia = - total_liquidar - pago_rutas_que_no_llegan - pago_de_créditos + total_efectivo + transferencia + cheque + faltante_del_chofer + faltante_por_robo + faltante_x_nota_de_crédito + faltante_rutas_que_no_llegan + créditos_otorgados;
			document.getElementById("diferencia").value = diferencia.toFixed(2);
			if(diferencia > 0){
			diferencia = document.getElementById("diferencia");
			diferencia.style.color="#00ff00";
			} else{
				diferencia = document.getElementById("diferencia");
				diferencia.style.color="#cc0000";
			}
		}
		function anular(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        return (tecla != 13);
    	}
	</script>
</head>
<body style="background-color:rgb(169, 243, 196)">
	<h1>Liquidación de Rutas</h1>
	<form method="POST" onkeypress="return anular(event)">
	Bienvenido <?php echo $_SESSION['username']; ?> <br><br>
	Ruta: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
	<label><select name="ruta" required>
			<?php
			$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);
			$getruta = "SELECT ruta FROM rutas";
			$ejecutar1 = mysqli_query($con,$getruta);
			?>

			<?php 
			foreach ($ejecutar1 as $opciones): ?>
			<option> <?php echo$opciones['ruta'] ?> </option>
			<?php  endforeach?>
		</select></label>
		   <br><br><br>

		<label for="venta_neta">Venta Neta:</label>
		<input type="number" id="venta_neta" name="venta_neta" value=0 step="0.01" oninput="calcularTotal()" onchange="calcularTotal()">

		<label for="dummy">Dummy:</label>
		<input type="number" id="dummy" name="dummy" value=0 step="0.01" oninput="calcularTotal()" onchange="calcularTotal()">

		<label for="total_liquidar">Total a liquidar:</label>
		<input type="number" id="total_liquidar" name="total_liquidar" value=0 readonly onchange="calcularTotal()" ><br><br><br><br>

		<label for="atm">Billetes ATM:</label>
		<input type="number" id="atm" name="atm" value=0 step="0.01" oninput="calcularTotal()">

		<label for="billetes">Billetes Tombola:</label>
		<input type="number" id="billetes" name="billetes" value=0 step="0.01" oninput="calcularTotal()">

		<label for="monedas">Monedas:</label>
		<input type="number" id="monedas" name="monedas" value=0 step="0.01" oninput="calcularTotal()">

		<label for="total_efectivo">Total Efectivo:</label>
		<input type="number" id="total_efectivo" name="total_efectivo" value=0 readonly oninput="calcularTotal()"><br><br> <br><br>

		<label for="transferencia">Transferencia:</label>
		<input type="number" id="transferencia" name="transferencia" value=0 step="0.01" oninput="calcularTotal()">

		<label for="cheque">Cheque:</label>
		<input type="number" id="cheque" name="cheque" value=0 step="0.01" oninput="calcularTotal()">

		<label for="total_de_valores_recibidos">Total de valores recibidos:</label>
		<input type="number" id="total_de_valores_recibidos" name="total_de_valores_recibidos" value=0 readonly><br><br><br><br>

		<label for="faltante_del_chofer">Faltante del chofer:</label>
		<input type="number" id="faltante_del_chofer" name="faltante_del_chofer" value=0 step="0.01" oninput="calcularTotal()">

		<label for="faltante_por_robo">Faltante por robo:</label>
		<input type="number" id="faltante_por_robo" name="faltante_por_robo" value=0 step="0.01" oninput="calcularTotal()">

		<label for="faltante_x_nota_de_crédito">Faltante x Nota de Crédito:</label>
		<input type="number" id="faltante_x_nota_de_crédito" name="faltante_x_nota_de_crédito" value=0 step="0.01" oninput="calcularTotal()">

		<label for="créditos_otorgados">Créditos Otorgados:</label>
		<input type="number" id="créditos_otorgados" name="créditos_otorgados" value=0 step="0.01" oninput="calcularTotal()">

		<label for="faltante_rutas_que_no_llegan">Faltante - Rutas que no llegan:</label>
		<input type="number" id="faltante_rutas_que_no_llegan" name="faltante_rutas_que_no_llegan" value=0 step="0.01" oninput="calcularTotal()"><br><br><br><br>

		<label for="pago_rutas_que_no_llegan">Pago - Rutas que no llegan:</label>
		<input type="number" id="pago_rutas_que_no_llegan" name="pago_rutas_que_no_llegan" value=0 step="0.01" oninput="calcularTotal()">

		<label for="pago_de_créditos">Pago de Créditos:</label>
		<input type="number" id="pago_de_créditos" name="pago_de_créditos" value=0 step="0.01" oninput="calcularTotal()"><br><br><br><br>

		<label for="diferencia" class="diferencia">Diferencia:</label>
		<input type="number" id="diferencia" name="diferencia" value=0 class="diferencia" readonly>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<button type="submit" name="guardar" style='width:150px; height:50px'>Guardar</button>

	</form>
	<a class="cerrar" href="cerrar.php" > Salir </a>

	<nav class="menu_consult-f">
        <p class="labelmenu-f">Ultimos 10 registros</p>
		<p class="labelmenu-f2">Nota: Si acabas de ingresar un registro no se vera hasta que hagas otro o hasta que actualices la pagina </p>
		<br><br>
        
        
    <table>
		<thead>
        <tr>
            <th>usuario</th>
            <th>ruta</th>
            <th>venta_neta:</th>
            <th>dummy:</th>
            <th>total_liquidar:</th>
            <th>billetes ATM:</th>
            <th>Billetes Tombola:</th>
            <th>monedas:</th>
            <th>total_efectivo</th>
            <th>transferencia</th>
            <th>cheque</th>
            <th>total_de_valores_recibidos</th>
            <th>faltante_del_chofer:</th>
            <th>faltante_por_robo:</th>
            <th>faltante_x_nota_de_crédito </th>
            <th>faltante_rutas_que_no_llegan</th>
            <th>pago_rutas_que_no_llegan</th>
            <th>créditos_otorgados</th>
            <th>pago_de_créditos</th>
            <th>diferencia</th>
            <th>fecha</th>
        </tr>
		</thead>
        <?php
            $prod= mysqli_query($con,"call Datos('$usuario')"); 
             while ($rp=mysqli_fetch_array($prod)) {
                ?>
            <tr>    
                <td> <?=$rp['usuario']?>       </td>            
                <td> <?=$rp['ruta']?>       </td>
                <td> <?=$rp['venta_neta']?>    </td>
                <td> <?=$rp['dummy']?>    </td>
                <td> <?=$rp['total_liquidar']?>    </td>
                <td> <?=$rp['atm']?>    </td>
                <td> <?=$rp['billetes']?>    </td>
                <td> <?=$rp['monedas']?>    </td>
                <td> <?=$rp['total_efectivo']?>    </td>
                <td> <?=$rp['transferencia']?>    </td>
                <td> <?=$rp['cheque']?>    </td>
                <td> <?=$rp['total_de_valores_recibidos']?>    </td>
                <td> <?=$rp['faltante_del_chofer']?>    </td>
                <td> <?=$rp['faltante_por_robo']?>    </td>
                <td> <?=$rp['faltante_x_nota_de_crédito']?>    </td>
                <td> <?=$rp['faltante_rutas_que_no_llegan']?>    </td>
                <td> <?=$rp['pago_rutas_que_no_llegan']?>    </td>
                <td> <?=$rp['créditos_otorgados']?>    </td>
                <td> <?=$rp['pago_de_créditos']?>    </td>
                <td> <?=$rp['diferencia']?>    </td>
                <td> <?=$rp['fecha']?>    </td>
            </tr>
            <?php
        }
        ?>

</table>
                
    </nav>
</body>
</html>

<?php
$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);
if(isset($_POST['guardar'])){
	$usuario= $_SESSION['username'];
	$ruta = $_POST ['ruta'];
	$venta_neta = $_POST ['venta_neta'];
	$dummy = $_POST ['dummy'];
	$total_liquidar = $_POST ['total_liquidar'];
	$atm = $_POST ['atm'];
	$billetes = $_POST ['billetes'];
	$monedas = $_POST ['monedas'];
	$total_efectivo = $_POST ['total_efectivo'];
	$transferencia = $_POST ['transferencia'];
	$cheque = $_POST ['cheque'];
	$total_de_valores_recibidos = $_POST ['total_de_valores_recibidos'];
	$faltante_del_chofer = $_POST ['faltante_del_chofer'];
	$faltante_por_robo = $_POST ['faltante_por_robo'];
	$faltante_x_nota_de_crédito = $_POST ['faltante_x_nota_de_crédito'];
	$faltante_rutas_que_no_llegan = $_POST ['faltante_rutas_que_no_llegan'];
	$pago_rutas_que_no_llegan = $_POST ['pago_rutas_que_no_llegan'];
	$créditos_otorgados = $_POST ['créditos_otorgados'];
	$pago_de_créditos = $_POST ['pago_de_créditos'];
	$diferencia = $_POST ['diferencia'];
	// $sub= $total /1.16;
	// $iva= $total - $sub;

	date_default_timezone_set("America/Mexico_City");

	$fecha=date("d-m-Y h:i:s a");
	

	$insertar = "INSERT INTO formbase (usuario,ruta,venta_neta,dummy,total_liquidar,atm,billetes,monedas,total_efectivo,transferencia,cheque,total_de_valores_recibidos,faltante_del_chofer,
	faltante_por_robo,faltante_x_nota_de_crédito,faltante_rutas_que_no_llegan,pago_rutas_que_no_llegan,créditos_otorgados,pago_de_créditos,diferencia,fecha) VALUES 
	('$usuario','$ruta','$venta_neta','$dummy','$total_liquidar','$atm','$billetes','$monedas','$total_efectivo','$transferencia','$cheque','$total_de_valores_recibidos','$faltante_del_chofer',
	'$faltante_por_robo','$faltante_x_nota_de_crédito','$faltante_rutas_que_no_llegan','$pago_rutas_que_no_llegan','$créditos_otorgados','$pago_de_créditos','$diferencia','$fecha')";

    $ejecutar= mysqli_query ($con,$insertar);

	alert("Registro exitoso");

 }
?>

