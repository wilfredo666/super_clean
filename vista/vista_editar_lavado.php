<?php
 require('../conector/conexion.php');

 echo "<h4> Codigo del servicio de Lavado : "; echo $codigo_lavado = trim($_POST['ID_lavado']);
 echo "</h4>";
 ?>
 <div>
  <button class="btn btn-primary btn-md" onclick="btn_agregar_edicion_prenda_lavado('<?php echo $codigo_lavado; ?>');"> Agregar Prenda </button>
  <div id="mensaje_edicion_lavado"></div>
  <table class="table table-bordered table-condensed">
  
  <tr>
    <th class="col-lg-1"> Codigo Lav </th>
    <th> </th>
    <th> Prenda </th>
    <th> tipo </th>
    <th> cliente </th>
    <th class="col-lg-1"> estado </th>
    <th class="col-lg-1"> fecha </th>
    <th colspan="2"> </th>
  </tr>

 <?php
 
 $query = pg_query("SELECT * FROM lavado WHERE codigo_lavado='$codigo_lavado' ORDER BY codigo_tikeo ASC ");
 while($row = pg_fetch_array($query))
 {
 
  $id_lavado = $row['id_lavado']; 
  $id_usuario = $row['id_usuario'];
  $id_cliente = $row['id_cliente'];

  $id_sucursal = $row['id_sucursal'];
  $id_ot = $row['id_ot'];
  $codigo_ot = $row['codigo_ot'];
  $id_prenda = $row['id_prenda'];

  $codigo_lavado = $row['codigo_lavado'];
  $cliente = $row['cliente'];

  $fecha = $row['fecha'];
  $hora = $row['hora'];
 
  $tipo_lavado = trim($row['tipo_lavado']);

  if($tipo_lavado=="1")
  { $tipo = 'SECO'; }
  else{ if($tipo_lavado=="2"){ $tipo = 'VAPOR'; }}

  
  $estado_lavado = $row['estado_lavado'];
  $codigo_tikeo = $row['codigo_tikeo'];
  
  $sql_prend = pg_query("SELECT * FROM prenda WHERE id_prenda = '$id_prenda'");
  $row_prend = pg_fetch_array($sql_prend);

  $prenda = $row_prend['prenda'];
  $img = $row_prend['portada'];

  ?>
   <tr style="font-size: 11px;">
    <td style="font-weight: bold;"> <?php echo $codigo_tikeo; ?> </td>
     <td style="padding: 0px; text-align: center;"> <img src="../multimedia/imagenes/<?php echo $img; ?>" style=" width: 50px; height: 50px;"> </td>
     <td align="center" > <?php echo $prenda; ?> </td>
     <td align="center" > <?php echo $tipo; ?>
     <select class="form-control" id="tipo_lavado_<?php echo $id_lavado; ?>">
       <option value=""> Seleccion </option>
       <option value="1"> SECO </option>
       <option value="2"> VAPOR</option>
     </select>

      </td>
     <td align="center" > <?php echo $cliente; ?> </td>
     <td align="center" style="font-weight: bold;" > <?php echo $estado_lavado; ?> </td>
     <td align="center"> <?php echo $fecha; echo "</br>"; echo $hora; ?> </td>
     <td> <button class="btn btn-default btn-xs" onclick="btn_editar_prenda_lavado('<?php echo $id_lavado; ?>');"> Editar </button></td>
     <td> <button class="btn btn-danger btn-xs" onclick="btn_eliminar_prenda_lavado('<?php echo $id_lavado; ?>');" > Eliminar </button></td>
   </tr>
  <?php 

 }

 ?>
</table>
</div>
 <script type='text/javascript' src='../control/control_editar_lavado.js'></script>
 
