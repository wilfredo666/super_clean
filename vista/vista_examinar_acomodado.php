
 <?php
 require('../conector/conexion.php');

 $ID_acomodado = $_POST['ID_acomodado'];

 $query = pg_query("SELECT * FROM acomodado WHERE id_acomodado='$ID_acomodado'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Prenda : </label> </br>
       <center>
       <?php $id_prenda=$row['id_prenda'];  
                 $sql_p = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
                 $row_p = pg_fetch_array($sql_p);
                 echo $prenda = $row_p['prenda'];
                 $img = $row_p['portada'];
         ?>
       </center>
       <img src="../multimedia/imagenes/<?php echo $img; ?>" style="width: 100%; height: 350px;" >

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Cliente : </label> </br>  
       <?php echo $cliente=$row['cliente']; ?>
       </div>
 
       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Codigo OT : </label> </br>  
       <?php echo $codigo_ot=$row['codigo_ot']; ?> 
      </div>

       
       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Lugar : </label> </br>  
       <label style='color:green; font-size:20px;'> <?php echo $lugar=$row['lugar']; ?>  </label>
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Estado : </label> </br>  
       <?php echo $estado_acomodado=$row['estado_acomodado']; ?> 
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> Codigo Barras : </label> </br>  
       <?php echo $codigo_tikeo=$row['codigo_tikeo']; ?> 
       </div>

     

    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_acomodado.js'></script>
 
