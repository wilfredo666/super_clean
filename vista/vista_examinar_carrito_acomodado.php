
 <?php
 require('../conector/conexion.php');

 $ID_carrito_acomodado = $_POST['ID_carrito_acomodado'];

 $query = pg_query("SELECT * FROM carrito_acomodado WHERE id_carrito_acomodado='$ID_carrito_acomodado'");
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

       <label> id_lugar : </label> </br>  
       <?php echo $id_lugar=$row['id_lugar']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> lugar : </label> </br>  
       <?php echo $lugar=$row['lugar']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> estado_acomodado : </label> </br>  
       <?php echo $estado_acomodado=$row['estado_acomodado']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> codigo_tikeo : </label> </br>  
       <?php echo $codigo_tikeo=$row['codigo_tikeo']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo_lavado : </label> </br>  
       <?php echo $tipo_lavado=$row['tipo_lavado']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> id_lavado : </label> </br>  
       <?php echo $id_lavado=$row['id_lavado']; ?> 

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
 <script type='text/javascript' src='../control/control_editar_carrito_acomodado.js'></script>
 
