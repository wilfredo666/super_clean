<?php
 require('../conector/conexion.php');

 $ID_acomodado = $_POST['ID_acomodado'];

 $query = pg_query("SELECT * FROM acomodado WHERE id_acomodado='$ID_acomodado'");
 while($row = pg_fetch_array($query))
  {
      ?> 

      <div class='row'>
        <input type="hidden" value="<?php echo $ID_acomodado; ?>" id="ID_acomodado">
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

       <select class="form-control" id="select_lugar">
        <option value=""> Seleccion </option>
       
       <?php 
                 $sql_a = pg_query("SELECT * FROM area_acomodado ORDER BY area_acomodado ASC");
                 while($row_a = pg_fetch_array($sql_a))
                 {
                   $id_lugar = $row_a['id_area_acomodado'];
                   $lugar = $row_a['area_acomodado'];
                  ?>
                  <option value="<?php echo $id_lugar; ?>"> <?php echo $lugar; ?> </option>  
                  <?php
               }
         ?> 
       </select>

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
 