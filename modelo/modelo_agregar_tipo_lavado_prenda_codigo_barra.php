<?php
 require "../conector/conexion.php";

 $codigo_barras = trim($_POST['prenda_codigo_barras']);
  
 $size = trim($_POST['size']);
 $id_usuario = trim($_POST['id_usuario']);
 $id_sucursal = trim($_POST['id_sucursal']);
 $tipo_lavado = trim($_POST['tipo_lavado']); echo "</br>";

 $tamanio = strlen($codigo_barras);
 $tamanio = trim($tamanio);

 $size = trim($size);  

 if($tamanio==$size) {
 
 echo " Codigo de barras = "; echo $codigo_barras; echo "</br>";

 $sql_tik = pg_query("SELECT * FROM tikeo WHERE codigo_barras = '$codigo_barras' AND estado_tikeo='ACTIVO'");
 $cont_tik=0;
 while ($row_tik = pg_fetch_array($sql_tik)) {
  $cont_tik++;
 }
 
 //echo " Cantidad "; echo $cont_tik; echo "</br>";
 
 if ($cont_tik>0) {

  $sql_tik = pg_query("SELECT * FROM tikeo WHERE codigo_barras = '$codigo_barras' AND estado_tikeo='ACTIVO'");
  $row_tik = pg_fetch_array($sql_tik);
  $id_ot = $row_tik['id_ot'];  
  $row_tik['codigo_barras']; 
  
  /* INTRODUCIOMOS AL CARRITO DE TIKEO */

  $sql_ot = pg_query("SELECT * FROM orden_trabajo WHERE id_orden_trabajo = '$id_ot'");
  $row_ot = pg_fetch_array($sql_ot);

  echo "</br>"; echo $id_cliente = $row_ot['id_cliente'];
  echo "</br>"; echo $cliente = $row_ot['cliente'];
  echo "</br>"; echo $codigo_ot = $row_ot['codigo_ot'];
  echo "</br>"; echo $id_prenda = $row_ot['id_prenda'];

  echo "INSERT INTO carrito_lavado(
            id_usuario, id_cliente, cliente, id_sucursal, 
            id_ot, codigo_ot, tipo_lavado, estado_lavado, codigo_tikeo, id_prenda)
    VALUES ('$id_usuario', '$id_cliente', '$cliente', '$id_sucursal','$id_ot','$codigo_ot', '$tipo_lavado', 'ACTIVO', '$codigo_barras', '$id_prenda')"; 

  echo "</br>";

  $sql_car = pg_query("INSERT INTO carrito_lavado(
            id_usuario, id_cliente, cliente, id_sucursal, 
            id_ot, codigo_ot, tipo_lavado, estado_lavado, codigo_tikeo, id_prenda)
    VALUES ('$id_usuario', '$id_cliente', '$cliente', '$id_sucursal','$id_ot','$codigo_ot', '$tipo_lavado', 'ACTIVO', '$codigo_barras', '$id_prenda')");
   
 
 

  ?>
  <script type="text/javascript">
  	btn_filtrador_codigo_barras();
    $("#prenda_codigo_barras").val("");
  	/*setTimeout(function(){
  	 btn_listar_ropa_tipo_lavado();
  	},2000);*/

  </script>
  <?php

  }
  else{
     echo "<label style='color:red;'> NO SE ENCONTRO EN LA PRENDA !!! </BR> 
                                      REVISE EL MODULO DE TIKEO  </label>";
      ?>
  <script type="text/javascript">
    
    setTimeout(function(){
      btn_listar_ropa_tipo_lavado();
      $("#prenda_codigo_barras").val("");
    },3000);
  </script>
  <?php
  }
 
 
 }
 else
 {

  echo "<label style='color:red;'> ESCRIBA UN CODIGO DE BARRAS !!! </label>";
  ?>
  <script type="text/javascript">
    
    setTimeout(function(){
     btn_listar_ropa_tipo_lavado();
    $("#prenda_codigo_barras").val(""); 
    },3000);

  </script>
 <?php
 }

?>