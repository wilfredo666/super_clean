<?php

 require "../conector/conexion.php";
 $id_usuario = $_POST['id_usuario'];
 $id_sucursal = $_POST['id_sucursal'];

 $sql_cant = pg_query("SELECT * FROM carrito_lavado WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal'");
    
 while ($row_cant = pg_fetch_array($sql_cant))
 {
       $codigo_barras = $row_cant['codigo_tikeo'];
       $tipo_lavado = $row_cant['tipo_lavado'];

       $sql_ver = pg_query("SELECT * FROM carrito_lavado WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal' AND codigo_tikeo='$codigo_barras' AND tipo_lavado='$tipo_lavado'");
    
       $cont = 0;
       while ($row_ver = pg_fetch_array($sql_ver)){ $cont++; }

         // echo "la cantidad es igual = "; echo $cont; echo "</br>";
    
            if($cont==1)
            {

            }
            else
            {
                if ($cont>1) {

                    for ($i=1; $i <$cont; $i++) { 

                         $sql_listar = pg_query("SELECT * FROM carrito_lavado WHERE id_usuario = '$id_usuario' AND id_sucursal='$id_sucursal' AND codigo_tikeo = '$codigo_barras' AND tipo_lavado='$tipo_lavado' ORDER BY id_carrito_lavado DESC LIMIT  1"); 
                        
                         $row_listar = pg_fetch_array($sql_listar);

                         echo " id carrito = "; echo $id_carrito_lavado = $row_listar['id_carrito_lavado']; echo "</br>";
                         $sql_eliminar = pg_query("DELETE FROM carrito_lavado WHERE id_carrito_lavado ='$id_carrito_lavado'");
                        

                        
                    }
                    
                }
            }

 }

?>