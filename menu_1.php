<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: /index.php');
  }
include "configs/config.php";
include "configs/funciones.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet"  href="style/css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EVENT</title>
</head>
<body class="in">
<div class="img_menu"><center><img src="style\imagenes\logo.png" ></center></div>
<div class="botones">
<center>
  <h1>MENU</h1>
  Bienvenido : <?php echo $_SESSION['username']; ?> eligue una de las siguientes opciones <?php echo $_SESSION['rol']; ?>
  <br><br><br><br><br>
  <button class="boton" type="submit" name="enviar" onclick="menu()">Power BI</button>
  <button class="boton" type="submit" name="enviar" onclick="formulario()">Liquidacion</button>
  <br><br><br>
  <button class="boton" type="submit" name="enviar" onclick="manuales()">Manuales</button>
  <button class="boton" type="submit" name="enviar" onclick="flota()">Levantar un ticket de FLOTA VEHICULAR</button>
  <br><br><br>
  <button class="boton" type="submit" name="enviar" onclick="instalaciones()">Levantar un ticket de INSTALACIONES</button>
  <button class="boton" type="submit" name="enviar" onclick="autoventas()">Seguimiento Autoventas</button>
</center>
</form>
</div> 
</body>
</html>

<script>
      function menu() {
        window.location.href = "https://app.powerbi.com/view?r=eyJrIjoiYjU0ZjFjNTItZjYyYi00YmZlLTlmNTAtZGJkZTA3ODA1NDViIiwidCI6ImVkZDhhNmM1LTIxYTItNGJiZi1iM2UzLWQ5Y2NiMWJlNzdhYyJ9";
      }

	  function formulario() {
        window.location.href = "formbase.php";
      }
      function manuales() {
        window.location.href = "https://kisseros69.sharepoint.com/sites/ManualesdeIntranet/Documentos%20compartidos/Forms/AllItems.aspx";
      }
      function flota() {
        window.location.href = "https://forms.office.com/Pages/ResponsePage.aspx?id=xabY7aIhv0uz49nMsb53rECSj_C49ldMtGSDe4ITOXZURE9BUDhaVlRJRExJNFoyMFUwU1RTUUdHTC4u ";
      }
      function instalaciones() {
        window.location.href = "https://forms.office.com/Pages/ResponsePage.aspx?id=xabY7aIhv0uz49nMsb53rECSj_C49ldMtGSDe4ITOXZUNE5UNzlRQVRRRlBZVTlONDk3REtDUEI1Ni4u ";
      }

      function autoventas() {
        window.location.href = "https://app.powerbi.com/view?r=eyJrIjoiODQxNzQwNTgtOWY4OC00MDYwLTllNTEtNzhhM2MyMDFmYjVjIiwidCI6ImVkZDhhNmM1LTIxYTItNGJiZi1iM2UzLWQ5Y2NiMWJlNzdhYyJ9";
      }
  </script>