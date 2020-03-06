
 <?php
 require('../conector/conexion.php');

 $ID_chofer = $_POST['ID_chofer'];

 $query = pg_query("SELECT * FROM chofer WHERE id_chofer='$ID_chofer'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> chofer : </label> </br>  
       <?php echo $nombre_completo=$row['nombre_completo']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> direccion : </label> </br>  
       <?php echo $direccion=$row['direccion']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label> </br>  
       <?php echo $celular=$row['celular']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label> </br>  
       <?php echo $telefono=$row['telefono']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_chofer.js'></script>
 
