<?php
session_start([
  'cookie_lifetime' => 86400,
]);
if(!isset($_SESSION['username'])){
  
  }else{
    $ro=$_SESSION['rol'];
    $red="menu_$ro.php";
    header("location: ".$red);
  }
include "configs/config.php";


	if (isset($_POST['logear'])){
    $usuario = $_POST ['usuario'];
	  $contra = $_POST ['contra'];
    
        $q=mysqli_query($con, "call Login('$usuario','$contra')");
        $array = mysqli_fetch_array($q);
        
        if(is_array($array)){
            if($array['id_rol']==1){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
          header("location: menu_1.php");
            }else
            if ($array['id_rol']==2){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
            header("location: menu_2.php");
            }else
            if ($array['id_rol']==3){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
            header("location: menu_3.php");
            }else
            if ($array['id_rol']==4){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
            header("location: menu_4.php");
            }else
            if ($array['id_rol']==5){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
            header("location: menu_5.php");
            }else
            if ($array['id_rol']==6){
            $_SESSION['username'] = $usuario;
            $_SESSION['rol']=$array['id_rol'];
            header("location: menu_6.php");
            }
        }else{
        echo "Usuario o contraseña incorrecto";
      }
      // $rol=mysqli_query($con, "SELECT id_rol FROM admins WHERE usuario='$usuario'");
      // $_SESSION['rol']=$rol;
  }

  
      
      // if(isset($_GET['cerrar_sesion'])){
      //   session_unset();
      //   session_destroy();
      // } 
?>
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












