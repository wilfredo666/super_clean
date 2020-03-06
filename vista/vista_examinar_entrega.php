
 <?php
 require('../conector/conexion.php');

 $ID_entrega = $_POST['ID_entrega'];

 $query = pg_query("SELECT * FROM entrega WHERE id_entrega='$ID_entrega'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       
       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> cliente : </label>  
       <?php $codigo_ot = trim($row['codigo_ot']);

       $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE codigo_ot = '$codigo_ot'");
       $row_ot = pg_fetch_array($sql_ot);
       echo $cliente = $row_ot['cliente']; 

       ?> 
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> codigo ot: </label>  
       <?php echo $codigo_ot; ?> 
       </div>

       <div class='col-lg-12 col-sm-12 col-xs-12'>
       <label> estado : </label>  
       <?php echo $estado=$row['estado']; ?> 

       </div>

       <div class='col-lg-4 col-sm-4 col-xs-12'>

       <label> total : </label> </br>  
       <?php echo $total=$row['total']; echo " Bs. "; ?> 

       </div>

       <div class='col-lg-4 col-sm-4 col-xs-12'>

       <label> pago : </label> </br>  
       <?php echo $pago=$row['pago']; echo " Bs. "; ?> 

       </div>

       <div class='col-lg-4 col-sm-4 col-xs-12'>

       <label> saldo : </label> </br>  
       <?php echo $saldo=$row['saldo']; echo " Bs. "; ?> 

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> fecha : </label>  
       <?php $fecha = $row['fecha'];

            date_default_timezone_set('America/Los_Angeles');  
            echo date('d/m/Y', strtotime($fecha)) ?>   
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> hora : </label>  
       <?php echo $hora=$row['hora']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_entrega.js'></script>
 
