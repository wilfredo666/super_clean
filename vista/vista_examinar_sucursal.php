
 <?php
 require('../conector/conexion.php');

 $ID_sucursal = $_POST['ID_sucursal'];

 $query = pg_query("SELECT * FROM sucursal WHERE id_sucursal='$ID_sucursal'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sucursal : </label> </br>  
       <?php echo $sucursal=$row['sucursal']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> encargado : </label> </br>  
       <?php echo $encargado=$row['encargado']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label> </br>  
       <?php echo $telefono=$row['telefono']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label> </br>  
       <?php echo $celular=$row['celular']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_sucursal.js'></script>
 
