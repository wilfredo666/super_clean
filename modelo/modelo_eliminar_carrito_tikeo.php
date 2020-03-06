
  <?php
  $id_carrito_tikeo = $_POST['id_carrito_tikeo'];
  require('../conector/conexion.php');  

  $sql_tik = pg_query("SELECT * FROM carrito_tikeo WHERE id_carrito_tikeo ='$id_carrito_tikeo'");
  $row_tik = pg_fetch_array($sql_tik);
  $id_ot = trim($row_tik['id_ot']);

  $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");
  $row_ot = pg_fetch_array($sql_ot);

  $id_cliente = trim($row_ot['id_cliente']);
  $cliente = trim($row_ot['cliente']);
  $codigo_ot = trim($row_ot['codigo_ot']);
  $id_prenda = trim($row_ot['id_prenda']);

  ?>

  	<script type="text/javascript">
		   	setTimeout(function(){ 
	         $("#codigo_barras_tik_<?php echo $id_ot; ?>").val(""); 
	         btn_listar_carrito_prendas_tikeadas();
	         btn_mostrar_prendas_orden_trabajo("<?php echo $codigo_ot; ?>");
	        },0);
    </script>
    <?php 

  $query = pg_query("DELETE FROM carrito_tikeo WHERE id_carrito_tikeo ='$id_carrito_tikeo'");
  ?>
   <div class='alert alert-info' role='alert'>
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
  ?>

	
  
