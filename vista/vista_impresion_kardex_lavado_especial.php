<style type="text/css">
 table{
  width: 100%;
  font-family: arial;
 }
 table, th, td {

  border: 1px solid #BDBDBD;
  border-collapse: collapse;
  padding: 0.5%;
  font-size: 11px;
}

table th{
 text-transform: uppercase;
}
</style>
 
<?php
  require "../conector/conexion.php";
	$fecha_inicio = trim($_GET['fecha_ini']);
	$fecha_fin = trim($_GET['fecha_fin']);
	$tipo = trim($_GET['tipo']);
  ?>
  <div style="width: 100%; text-align: center; font-family: arial;">
  <h3 style="margin:0px;"> Lista de Servicios de Lavados Especiales </h3>
  <p style="margin:0px; margin-bottom: 1%;"> Del periodo inicial <?php echo $fecha_inicio; ?> al <?php echo $fecha_fin; ?> </p>
</div>
  <?php
	 
	if ($tipo=='servicios') {
  ?>
    <table class='table table-bordered'>
        <thead>
        <tr >
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
         <td style="width: 110px;"><?php echo $row['estado'];?></td>

     </tr> <?php
        }
      ?>
      </tbody>
   </table>

 <?php
	 
	}

	if ($tipo=='cobros') {
  ?>

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
         <td style="color:green; width: 110px; "> COBRADO </td>

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
         <td style="color:green; width: 110px;"> COBRADO </td>

          
        </tr>    
     <?php
      }
      ?>
      </tbody>
   </table>

 <?php
 /* FINAL CONDICION TODOS */
 }

 ?>

 <script type="text/javascript">
   window.print();
 </script>