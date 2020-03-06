 <div class='row'>
  <div class='col-lg-12 col-sm-12 col-xs-12'>

    <table class="table table-bordered table-condensed" style="font-size: 12px;">
      <thead>
        <tr>
          <th> # </th>
          <th> Prenda </th>
          <th> </th>
          <th> Cliente </th>
          <th> Codigo OT</th>
          <th> Cod Bar </th>
          <th> Estado </th>
          <th> fecha </th>
          <th colspan="2"> </th>
        </tr>
      </thead>
  <?php
  require('../conector/conexion.php');

  echo "<h4> Servicio de Tikeo : "; echo $codigo_tik = $_POST['ID_tikeo']; echo "</h4";

  $query = pg_query("SELECT * FROM tikeo WHERE codigo_tik='$codigo_tik'");
  $i=0;
  while($row = pg_fetch_array($query))
   {
    $i++;
    $id_tikeo = $row['id_tikeo'];
    $id_cliente=$row['id_cliente'];
    $cliente=$row['cliente'];
    $codigo_ot=$row['codigo_ot'];
    $codigo_barras=$row['codigo_barras'];
    $estado=$row['estado_tikeo'];
    $id_prenda=$row['id_prenda'];
    $fecha=$row['fecha'];
    $hora=$row['hora'];
  ?> 
     
    <tr >
     <td> <?php echo $i; ?> </td>
     <td align="center" > 
      <?php  
       $sql_p = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
       $row_p = pg_fetch_array($sql_p);
       echo $prenda = $row_p['prenda'];
            $img = $row_p['portada'];
      ?>
     </td>
     <td align="center" > 
       <img src="../multimedia/imagenes/<?php echo $img; ?>" style="width: 50px; height: 50px;" >
     </td>
     <td> <?php echo $cliente; ?> </td>
    
     <td> <?php echo $codigo_ot; ?> </td>
     <td> 
     <input type="text" maxlength="8" id="codigo_bar_<?php echo trim($id_tikeo); ?>"
     value="<?php echo trim($codigo_barras); ?>"></td>
     
     <td> <?php echo $estado; ?> </td>
     <td align="center"> <?php echo $fecha; echo "</br>";  echo $hora; ?> </td>
     <td> <button class="btn btn-default btn-xs" onclick="btn_editar_prenda_tikeada('<?php echo $id_tikeo; ?>');"> Editar </button> </td>
     <td> <button class="btn btn-danger btn-xs" onclick="btn_eliminar_prenda_tikeada('<?php echo $id_tikeo; ?>');"> Eliminar </button> </td>
    </tr>
      
     
  <?php
  }

 ?>
 </table>
  <div id="panel_respuesta_editar_tikeo"> </div>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_tikeo.js'></script>
 
