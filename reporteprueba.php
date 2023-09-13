<?php 
include "configs/config.php";

$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style\css\estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <nav class="menu_consult">
        <p class="tituloconsult_system"></p>
        <p class="labelmenu">Tablas</p>
        <p class="labelmenu">_________________________________________________</p>
        
        
    <table class="tabla">
    
        <tr>
            <th>Proveedor</th>
            <th>Factura:</th>
            <th>Numero Fiscal:</th>
            <th>Descripcion:</th>
            <th>Gasto:</th>
            <th>Negocio:</th>
            <th>Sub Total</th>
            <th>IVA</th>
            <th>Total</th>
            <th>FECHA</th>
        </tr>

        <?php
            $prod= mysqli_query($con,"SELECT provedor,color,fiscal,descripcion,gasto,negocio,sub,iva,total,fecha  from form");
             while ($rp=mysqli_fetch_array($prod)) {
                ?>
            <tr>                
                <td> <?=$rp['provedor']?>       </td>
                <td> <?=$rp['color']?>    </td>
                <td> <?=$rp['fiscal']?>    </td>
                <td> <?=$rp['descripcion']?>    </td>
                <td> <?=$rp['gasto']?>    </td>
                <td> <?=$rp['negocio']?>    </td>
                <td> <?=$rp['sub']?>    </td>
                <td> <?=$rp['iva']?>    </td>
                <td> <?=$rp['total']?>    </td>
                <td> <?=$rp['fecha']?>    </td>
            </tr>
            <?php
        }
        ?>

</table>
                
    </nav>
    
    
</body>
</html>
