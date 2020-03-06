
  <?php 

  require('../conector/conexion.php');
 
    $id_prenda = trim($_POST['id_prenda']);
    
    $id_cliente = trim($_POST['id_cliente']);
    
    $cliente = trim($_POST['cliente']);
    
    $codigo_barras = trim($_POST['codigo_barras']);
    
    $id_usuario = trim($_POST['id_usuario']);
    
    $id_sucursal = trim($_POST['id_sucursal']);
    
    $fecha = trim($_POST['fecha']);
    
    $hora = trim($_POST['hora']);
    
    $ID_tikeo_cliente = $_POST['ID_tikeo_cliente'];
  
    $cadena= '';
  
    if($codigo_barras!='')
    {
       $sql_ver = pg_query("SELECT COUNT(*) AS count FROM tikeo_cliente WHERE codigo_barras = '$codigo_barras'");
       $row_ver = pg_fetch_array($sql_ver);
       $cont = $row_ver['count'];
       if($cont==0)
       {
         $query = pg_query("UPDATE tikeo_cliente SET codigo_barras = '$codigo_barras' WHERE id_tikeo_cliente = $ID_tikeo_cliente");
         $cadena.=' Se edito codigo_barras , ';
        
           if($cadena!='')
           {
              ?>
              <div class='alert alert-success' role='alert'>
              <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
              </div>
              
              <script type="text/javascript">
               setTimeout(function(){
               $('#myModal_Edicion').modal('hide').fadeIn('slow');
               },2000);
              </script>
             <?php

           }
           else
           { 
             ?>
             <div class='alert alert-danger' role='alert'>
             <strong>ALERTA! </strong> Debes ingresar datos validos.
             </div><?php
           }
       }
       else
       {
         ?>
         <div class='alert alert-danger' role='alert'>
          <strong> ERROR!! </strong> El codigo de barras es repetido !! INTENTE DE NUEVO
         </div>
         <script type="text/javascript">
           
         </script>
         <?php

       }
      
    } 



  ?>
