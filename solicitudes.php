<?php 
include "configs/config.php";
include "configs/funciones.php";
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
<body style="background-color:rgb(169, 243, 196)">
        
        <div class="tabla">
        <p class="titulopet">Solicitudes Creadas</p>   
    <table>
        <thead>
        <tr>
            <th>Proveedor</th>
            <th>Factura</th>
            <th>Folio Fiscal</th>
            <th>Breve Descripcion del Gasto</th>
            <th>Descripcion del Gasto</th>
            <th>Centro de Negocio</th>
            <th>Sub Total</th>
            <th>IVA</th>
            <th>Total</th>
            <th>Estatus</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <?php
            $prod= mysqli_query($con,"SELECT proveedor,factura,folio_fiscal,breve_descripcion,descripcion_gasto,centro_negocios,sub_total,iva,total,estatus,fecha  from formpet");
             while ($rp=mysqli_fetch_array($prod)) {
                ?>
            <tr>    
                <td> <?=$rp['proveedor']?>       </td>            
                <td> <?=$rp['factura']?>       </td>
                <td> <?=$rp['folio_fiscal']?>    </td>
                <td> <?=$rp['breve_descripcion']?>    </td>
                <td> <?=$rp['descripcion_gasto']?>    </td>
                <td> <?=$rp['centro_negocios']?>    </td>
                <td> <?=$rp['sub_total']?>    </td>
                <td> <?=$rp['iva']?>    </td>
                <td> <?=$rp['total']?>    </td>
                <td> <?=$rp['estatus']?>    </td>
                <td> <?=$rp['fecha']?>    </td>
   
            </tr>
            <?php
        }
        ?>

</table>
                
    </div>
    
    
</body>
</html>
