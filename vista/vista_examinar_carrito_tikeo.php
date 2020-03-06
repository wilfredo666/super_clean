
 <?php
 require('../conector/conexion.php');

 $ID_carrito_tikeo = $_POST['ID_carrito_tikeo'];

 $query = pg_query("SELECT * FROM carrito_tikeo WHERE id_carrito_tikeo='$ID_carrito_tikeo'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_cliente : </label> </br>  
       <?php echo $id_cliente=$row['id_cliente']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cliente : </label> </br>  
       <?php echo $cliente=$row['cliente']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_usuario : </label> </br>  
       <?php echo $id_usuario=$row['id_usuario']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_sucursal : </label> </br>  
       <?php echo $id_sucursal=$row['id_sucursal']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_ot : </label> </br>  
       <?php echo $id_ot=$row['id_ot']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_ot : </label> </br>  
       <?php echo $codigo_ot=$row['codigo_ot']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_barras : </label> </br>  
       <?php echo $codigo_barras=$row['codigo_barras']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado_tikeo : </label> </br>  
       <?php echo $estado_tikeo=$row['estado_tikeo']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_prenda : </label> </br>  
       <?php echo $id_prenda=$row['id_prenda']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_carrito_tikeo.js'></script>
 
