<?php 
include "configs/config.php";
include "configs/funciones.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet"  href="style/css/estilos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EVENT</title>
</head>
<body>
<div class="botones">
  <center>
    <h1> Menu de reportes </h1>
    Bienvenido : <?php echo $_SESSION['username']; ?> Escoje entre alguna de las siguientes opciones:
    <br><br>
    <button class="boton" type="submit" name="enviar" onclick="operacion()">Operaciones</button>
    <button class="boton" type="submit" name="enviar" onclick="finanzas()">Finanzas</button>
    <br><br><br>
    <button class="boton" type="submit" name="enviar" onclick="seguridad()">Seguridad Patrimonial</button>
  </center>

</div> 

</body>
</html>

<script>
      function operacion() {
        window.location.href = "https://app.powerbi.com/view?r=eyJrIjoiMmRkZjU0ZDktYjkxMy00ZmIwLWJkMjYtYTBiMDk2Y2EzZjE1IiwidCI6ImVkZDhhNmM1LTIxYTItNGJiZi1iM2UzLWQ5Y2NiMWJlNzdhYyJ9&pageName=ReportSection";
      }

	  function finanzas() {
        window.location.href = "https://app.powerbi.com/view?r=eyJrIjoiMmRkZjU0ZDktYjkxMy00ZmIwLWJkMjYtYTBiMDk2Y2EzZjE1IiwidCI6ImVkZDhhNmM1LTIxYTItNGJiZi1iM2UzLWQ5Y2NiMWJlNzdhYyJ9&pageName=ReportSectionc5208be8ff3299dedd8e";
      }

      function seguridad() {
        window.location.href = "https://app.powerbi.com/view?r=eyJrIjoiMmRkZjU0ZDktYjkxMy00ZmIwLWJkMjYtYTBiMDk2Y2EzZjE1IiwidCI6ImVkZDhhNmM1LTIxYTItNGJiZi1iM2UzLWQ5Y2NiMWJlNzdhYyJ9&pageName=ReportSection52c343c317c5d99a9583";
      }
  </script>
