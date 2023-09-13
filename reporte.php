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
    
    <nav class="menu_consult1">
        <p class="tituloconsult_system"></p>
        <p class="labelmenu">Tablas</p>
        <p class="labelmenu">_________________________________________________</p>
        
        
    <table class="tabla">
    
        <tr>
            <th>usuario</th>
            <th>ruta</th>
            <th>venta_neta:</th>
            <th>dummy:</th>
            <th>total_liquidar:</th>
            <th>billetes ATM:</th>
            <th>billetes:</th>
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

        <?php
            $prod= mysqli_query($con,"SELECT usuario,ruta,venta_neta,dummy,total_liquidar,atm,billetes,monedas,
            total_efectivo,transferencia,cheque,total_de_valores_recibidos,faltante_del_chofer,faltante_por_robo,faltante_x_nota_de_crédito,
            faltante_rutas_que_no_llegan,pago_rutas_que_no_llegan,créditos_otorgados,pago_de_créditos,diferencia,fecha  from formbase");
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
