<?php
require "../conector/conexion.php";
$opcion = trim($_POST['opcion']);

if ($opcion=='listar') {
	
	$fecha_inicio = trim($_POST['fecha_inicio']);
	$fecha_fin = trim($_POST['fecha_fin']);
	$tipo = trim($_POST['tipo']);
	 
	if ($tipo=='servicios') {

    ?>
    
    <div align="right">
    	<a class="btn btn-warning btn-xs" target='blank' href="vista_impresion_kardex_lavado_especial.php?tipo=<?php echo $tipo; ?>&fecha_ini=<?php echo $fecha_inicio; ?>&fecha_fin=<?php echo $fecha_fin; ?>"> Imprimir Reporte </a>
    </div>

    <table class='table table-bordered'>
        <thead>
        <tr>
          <th>codigo</th>
          <th>cliente</th>    
          <th>total</th>
          <th>pago</th>
          <th>saldo</th>
          <th>fecha</th>
          <th>hora</th>   
          <th>estado</th>  
           
        </tr>
       </thead>

      <tbody>
      <?php
   
        $sql = pg_query("SELECT * FROM lavado_especial WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY hora DESC");
        while($row = pg_fetch_array($sql)){
      ?>
        <tr> 
         <td style="color:black; font-weight: bold;"><?php echo $row['codigo'];?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row['total'];?></td>
         <td><?php echo $row['pago'];?></td>
         <td><?php echo $row['saldo'];?></td>
         <td><?php echo $row['fecha'];?></td>
         <td><?php echo $row['hora'];?></td>
         <td><?php echo $row['estado'];?></td>

     </tr> <?php
        }
      ?>
      </tbody>
   </table>

 <?php
	 
	}

	if ($tipo=='cobros') {
    ?>
    <div align="right">
    	<a class="btn btn-warning btn-xs" target='blank' href="vista_impresion_kardex_lavado_especial.php?tipo=<?php echo $tipo; ?>&fecha_ini=<?php echo $fecha_inicio; ?>&fecha_fin=<?php echo $fecha_fin; ?>"> Imprimir Reporte </a>
    </div>

    <table class='table table-bordered'>
        <thead>
        <tr>
          <th>codigo</th>
          <th>cliente</th>    
          <th>total</th>
          <th>pago</th>
          <th>saldo</th>
          <th>fecha</th>
          <th>hora</th>   
          <th>estado</th>  
          
        </tr>
       </thead>

      <tbody>
      <?php
 
     $sql_cob = pg_query("SELECT * FROM cobro_lavado_especial WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY hora DESC");
     while($row_cob = pg_fetch_array($sql_cob))
     {
       
       $codigo = trim($row_cob['codigo_lav']);
       $sql = pg_query("SELECT * FROM lavado_especial WHERE codigo='$codigo'");
       $row = pg_fetch_array($sql);

     ?>
        <tr style="background:#E6E6E6;"> 
         <td><?php echo $codigo;?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row_cob['total'];?></td>
         <td><?php echo $row_cob['pago'];?></td>
         <td><?php echo $row_cob['saldo'];?></td>
         <td><?php echo $row_cob['fecha'];?></td>
         <td><?php echo $row_cob['hora'];?></td>
         <td style="color:green;"> COBRADO </td>

    <td align='center'>

     </td>
     </tr>    
     <?php
      }
      ?>
      </tbody>
   </table>

   <?php
	}

	if ($tipo=='todos') {
	 
    ?>
    <div align="right">
    	<a class="btn btn-warning btn-xs" target='blank' href="vista_impresion_kardex_lavado_especial.php?tipo=<?php echo $tipo; ?>&fecha_ini=<?php echo $fecha_inicio; ?>&fecha_fin=<?php echo $fecha_fin; ?>"> Imprimir Reporte </a>
    </div>

    <table class='table table-bordered'>
        <thead>
        <tr>
          <th>codigo</th>
          <th>cliente</th>    
          <th>total</th>
          <th>pago</th>
          <th>saldo</th>
          <th>fecha</th>
          <th>hora</th>   
          <th>estado</th>  
           
        </tr>
       </thead>

      <tbody>
      <?php
   
      $sql = pg_query("SELECT * FROM lavado_especial WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY hora DESC");
      while($row = pg_fetch_array($sql))
      {
      ?>
        <tr> 
         <td style="color:black; font-weight: bold;"><?php echo $row['codigo'];?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row['total'];?></td>
         <td><?php echo $row['pago'];?></td>
         <td><?php echo $row['saldo'];?></td>
         <td><?php echo $row['fecha'];?></td>
         <td><?php echo $row['hora'];?></td>
         <td><?php echo $row['estado'];?></td>

     </tr>
     <?php
     $codigo = trim($row['codigo']);
 
     $sql_cob = pg_query("SELECT * FROM cobro_lavado_especial WHERE codigo_lav = '$codigo'");
     $row_cob = pg_fetch_array($sql_cob);

     ?>
        <tr style="background:#E6E6E6;"> 
         <td><?php echo $row['codigo'];?></td>
         <td><?php echo $row['cliente'];?></td>
         <td><?php echo $row_cob['total'];?></td>
         <td><?php echo $row_cob['pago'];?></td>
         <td><?php echo $row_cob['saldo'];?></td>
         <td><?php echo $row_cob['fecha'];?></td>
         <td><?php echo $row_cob['hora'];?></td>
         <td style="color:green;"> COBRADO </td>

          
        </tr>    
     <?php
      }
      ?>
      </tbody>
   </table>

 <?php
 /* FINAL CONDICION TODOS */
 }

}

?>