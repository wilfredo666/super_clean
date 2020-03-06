<?php

require "../conector/conexion.php";
$opcion = trim($_POST['opcion']);

if($opcion=='buscar_cliente')
{
	$ID_usuario = trim($_POST['ID_usuario']);
	$txt_buscar = trim($_POST['txt_buscar']);
?>
             <div style="position: absolute; width: 100%; background: white; margin-left: 0px; border: 1px solid #A4A4A4; margin-top: 1%; padding: 0%; max-height: 200px; overflow-y: scroll; z-index: 1;">
  
               <div align="right">
                 <button class="btn btn-danger btn-xs" onclick="btn_cerrar_select_cliente();"> Cerrar </button>
               </div>
               
               <table class="table table-bordered table-hover table-condensed" style="background: white; margin: 0px;">
               	<tr>
               		<th> # </th>
               		<th> Cliente </th>
               		<th> </th>
               	</tr>
    
                <?php
                    
                  $i =0;
                  $query = pg_query("SELECT * FROM cliente WHERE nombres ILIKE '%$txt_buscar%' OR apellidos ILIKE '%$txt_buscar%'");

                  while($row = pg_fetch_array($query))
                  { $i++;
                    $id_cliente = $row["id_cliente"];
                    $cliente = trim($row["nombres"])." ".trim($row["apellidos"]);
                  ?>
                     <tr>
                      <td class="col-lg-1"> <?php echo $i; ?></td>
                        <td> <?php echo $cliente; ?></td>
                        <td class="col-lg-1"  align="center"> 

                         <button class="btn btn-info btn-xs" onclick="btn_elegir_cliente('<?php echo $id_cliente; ?>', '<?php echo $cliente; ?>');"> Elegir </button> 

                        </td>
                     </tr>

                  <?php

                  }
                ?>

              </table>
              </div>
<?php
}

if($opcion=='buscar_prenda')
{
	$ID_usuario = trim($_POST['ID_usuario']);
	$txt_buscar = trim($_POST['txt_buscar']);
?>
             <div style="position: absolute; width: 100%; background: white; margin-left: 0px; border: 1px solid #A4A4A4; margin-top: 1%; padding: 0%; max-height: 200px; overflow-y: scroll; z-index: 1;">
  
               <div align="right">
                 <button class="btn btn-danger btn-xs" onclick="btn_cerrar_select_prenda();"> Cerrar </button>
               </div>
               
               <table class="table table-bordered table-hover table-condensed" style="background: white; margin: 0px;">
               	<tr>
               		<th> # </th>
               		<th> Portada </th>
               		<th> Prenda </th>
               		<th> </th>
               	</tr>
    
                <?php
                    
                  $i =0;
                  $query = pg_query("SELECT * FROM prenda WHERE prenda ILIKE '%$txt_buscar%'");

                  while($row = pg_fetch_array($query))
                  { $i++;
                    $id_prenda = trim($row["id_prenda"]);
                    $prenda = trim($row["prenda"]);
                    $portada = trim($row["portada"]);
                  ?>
                     <tr>
                        <td class="col-lg-1"> <?php echo $i; ?></td>
                        <td> <img src="../multimedia/imagenes/<?php echo $portada; ?>" style="width: 50px; height: 50px;" ></td>
                        <td> <?php echo $prenda; ?></td>
                        <td class="col-lg-1"  align="center"> 

                         <button class="btn btn-info btn-xs" onclick="btn_elegir_prenda('<?php echo $id_prenda; ?>', '<?php echo $prenda; ?>', '<?php echo $portada; ?>');"> Elegir </button> 

                        </td>
                     </tr>

                  <?php

                  }
                ?>

              </table>
              </div>
<?php
}

if($opcion=='editar_le')
{  
	$id_lavado = trim($_POST['id_lavado']);
	$medida = trim($_POST['medida']);

	$sql_upd = pg_query("UPDATE lavado_especial SET medida = '$medida' WHERE id_lavado_especial = '$id_lavado'");
}

if ($opcion =='mostrar_agregar') {
  $codigo = trim($_POST['codigo']);
  $sql_lav = pg_query("SELECT * FROM lavado_especial WHERE codigo ='$codigo'");
  $row_lav = pg_fetch_array($sql_lav);

  $id_cliente = trim($row_lav['id_cliente']);  
  $cliente = trim($row_lav['cliente']);  


?>
  <div class="row">
  
  <div class="col-lg-12 col-md-12 col-xs-12">
      <h4> Agregar Prendas al Pedido </h4>

      <label> Cliente : <?php echo $cliente; ?></label>
      <input type="hidden" id="id_cliente" value="<?php echo $id_cliente; ?>">
      <input type="hidden" id="cliente" value="<?php echo $cliente; ?>">
      <input type="hidden" id="codigo" value="<?php echo $codigo; ?>">
    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-xs-12">
        <hr>
      <input type="text" class="form-control" id="txt_buscar_prenda" placeholder="* Buscar Prenda" onkeyup="btn_buscar_agregar_prenda_LE()">
      <div id="resp_prenda_le"></div>
      <input type="hidden" id="id_prenda">
      <input type="hidden" id="prenda">
  </div>

  <div class="col-lg-12 col-md-12 col-xs-12">
       
      <div id="panel_resultado_registro_LE" style="margin-top: 1%;">
         
      </div>
  </div>

  </div>

<?php
}


if ($opcion == 'buscar_prenda_le') {
  echo "resultado para : <label> ";
  echo $txt_buscar = $_POST['txt_buscar'];
  echo "</label>";
?>
<div style="width: 100%; overflow-y: scroll; max-height: 300px;">
<div align="right">
  <button class="btn btn-danger btn-xs" onclick="btn_cerrar_select_prenda_pe();"> Cerrar </button>
</div>
 <table class="table table-bordered table-hover">
<?php
  $sql_pr = pg_query("SELECT * FROM prenda WHERE prenda ILIKE '%$txt_buscar%'");
  while ($row_pr = pg_fetch_array($sql_pr)) 
  {
    $id_prenda = trim($row_pr['id_prenda']);
    $prenda = trim($row_pr['prenda']);
    $precio = trim($row_pr['precio']);
    $portada = trim($row_pr['portada']);

   ?>

   <tr>
     <td align="center" class="col-lg-1"> <img src="../multimedia/imagenes/<?php echo $portada ?>" style="width: 50px; height: 50px;"> </td>
     <td> <?php echo $prenda ?></td>
     <td> <?php echo $precio; echo " Bs. "; ?></td>
     <td align="center" class="col-lg-1"> <button class="btn btn-info btn-xs" onclick="btn_elegir_prenda_le('<?php echo $id_prenda; ?>','<?php echo $prenda; ?>');"> Agregar </button></td>
   </tr>

   <?php
  }
  ?>
  </table>
  </div>
  <?php
}

if ($opcion=='registrar_prenda_le') {
   
   $id_prenda = $_POST["id_prenda"];
   $prenda = $_POST["prenda"];
   $id_cliente = $_POST["id_cliente"];
   $cliente = $_POST["cliente"];
   $codigo = trim($_POST["codigo"]);
 
   $sql_ser = pg_query("SELECT * FROM lavado_especial WHERE codigo = '$codigo'");
   $row_ser = pg_fetch_array($sql_ser);
   $total = $row_ser['total'];
   $pago  = $row_ser['pago'];
   $saldo  = $row_ser['saldo'];
   $id_usuario  = $row_ser['id_usuario'];
   $fecha = date('Y-m-d');
   $hora = date('H:i:s');

   $sql_ins = pg_query("INSERT INTO lavado_especial(
            cliente, id_cliente, prenda, id_prenda, medida, 
            total, pago, saldo, id_usuario, fecha, hora, codigo, estado)
    VALUES ( '$cliente', '$id_cliente', '$prenda', '$id_prenda', '0', 
            '$total', '$pago', '$saldo', '$id_usuario', '$fecha', '$hora', '$codigo', 'PENDIENTE')");

   if($sql_ins==TRUE)
   {
      ?>
      <div class='alert alert-info' role='alert'>
      <strong> REGISTRO CORRECTO!! </strong> Datos almacenados y guardados ?>
      </div><?php

   }
   else
   { 
     ?>
     <div class='alert alert-danger' role='alert'>
     <strong> ERROR!! </strong> Debes ingresar datos validos.
     </div><?php
   }

}
 
?>