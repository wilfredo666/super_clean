
 <?php
 require('../conector/conexion.php');

 $ID_cobro_lavado_especial = $_POST['ID_cobro_lavado_especial'];

 $query = pg_query("SELECT * FROM cobro_lavado_especial WHERE id_cobro_lavado_especial='$ID_cobro_lavado_especial'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-12 col-sm-12 col-xs-12'>

       <label> codigo  : </label>  
       <?php echo $codigo_lav=$row['codigo_lav']; ?> 

           </div>
       <div class='col-lg-4 col-sm-4 col-xs-12'>

       <label> total : </label>    
       <?php echo $total=$row['total']; echo " Bs. "; ?> 

           </div>
       <div class='col-lg-4 col-sm-4 col-xs-12'>

       <label> pago : </label>    
       <?php echo $pago=$row['pago']; echo " Bs. "; ?> 

       </div>
       
       <div class='col-lg-4 col-sm-4 col-xs-12'>
       <label> saldo : </label>   
       <?php echo $saldo=$row['saldo']; echo " Bs. "; ?> 
       </div>
       
       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> fecha : </label>    
       <?php echo $fecha=$row['fecha']; ?> 
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
 <script type='text/javascript' src='../control/control_editar_cobro_lavado_especial.js'></script>
 
