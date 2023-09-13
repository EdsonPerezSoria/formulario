<?php
session_start([
  'cookie_lifetime' => 86400,
]);
if(!isset($_SESSION['username'])){
  
  }else{
    header('location:menu.php'); 
  }
include "configs/config.php";
include "configs/funciones.php";
$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);

	if (isset($_POST['logear'])){
        $usuario = $_POST ['usuario'];
	    $contra = $_POST ['contra']; 

        $q=mysqli_query($con, "call Login('$usuario','$contra')");
        $array = mysqli_fetch_array($q);
        
        if(is_array($array)){
        if($array['id_rol']==1){
          $_SESSION['username'] = $usuario;
        header("location: menu.php");
        }else
          if ($array['id_rol']==2){
            $_SESSION['username'] = $usuario;
            header("location: formbase.php");
          }else{
          echo "Usuario o contraseña incorrecto";
        }
      }else{
        echo "Usuario o contraseña incorrecto";
      }
    }
      
      if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
      } 
?>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet"  href="style/css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body class="in">   
  <!-- style="background-color:rgb(216, 141, 29)" -->
  <div class="img_index"><center><img src="style\imagenes\logo.png" ></center></div>
<div class="menu_index">
    <form class="autentica2" method="post">
    

    <center><H1 class="tituloconsult_system">Ingresa</H1></center>

    <center>
        <div class="cuadros1">
           <label class="label_politica" style="margin-left:10%;">Usuario:</label> 
            <input class="in_index"type="text" name="usuario"  placeholder="usuario" class="input_pass">
        </div> 
        <br>   
        <div class="cuadros1">
            <label class="label_politica" style="margin-left:10%;">Contraseña:</label>
            <input class="in_index" type="password" name="contra"  placeholder="contra">
        </div>   
        <br><br><BR></BR>
        <center>
        <button type="submit" name="logear" style="background:green; color:white;">Enter</button>    
        </center> <br><br><br><br>
        
        </center>
    </form>
</div>
</body>
</html>












