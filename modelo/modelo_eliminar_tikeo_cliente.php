
  <?php
  $id_tikeo_cliente = trim($_POST['ID_tikeo_cliente']);
  require('../conector/conexion.php');

  $sql_tik_cli = pg_query("SELECT * FROM tikeo_cliente WHERE id_tikeo_cliente='$id_tikeo_cliente'");
  $row_tik_cli = pg_fetch_array($sql_tik_cli);
  $codigo_barras = $row_tik_cli['codigo_barras'];

  $sql_ver = pg_query("SELECT COUNT(*) AS count FROM tikeo WHERE codigo_barras = '$codigo_barras'");
  $row_ver = pg_fetch_array($sql_ver);
  $cont = $row_ver['count'];
  if($cont==0)
  { 
     $query = pg_query("DELETE FROM tikeo_cliente WHERE id_tikeo_cliente =$id_tikeo_cliente"); 
     ?>
     <div class='alert alert-info' role='alert'>
     <strong>CORRECTO!! </strong> Se elimino el dato correctamente
     </div>
     <script type="text/javascript">
     	
     	setTimeout(function(){
          $('#myModal_Eliminar').modal('hide').fadeIn('slow');
        },2000);

     	setTimeout(function(){
          $('#myModal_opciones').modal('hide').fadeIn('slow');
        },2500);

        setTimeout(function(){
          cargar_datos(1);
        },3000);

     </script><?php
  }
  
  else{
     ?>
     <div class='alert alert-danger' role='alert'>
     <strong>ERROR!! </strong> La prenda se asigno a tikeo y no se puede eliminar pedido
     </div><?php
  }
?>
 

  
