<?php
echo $area = $_POST['area'];

echo "</br>";

require '../conector/conexion.php';

$sql_areas = pg_query("SELECT column_name, data_type, character_maximum_length from information_schema.columns WHERE table_name = '$area'");

if (!$sql_areas) {
    echo 'No se pudo ejecutar la consulta: ' . pg_error();
    exit;
}

if (pg_num_rows($sql_areas) > 0) {
	$cont=0;
    while ($fila = pg_fetch_assoc($sql_areas)) {
      
        echo $campo = $fila['column_name']; 
        echo ":";
        echo $tipo = $fila['data_type']."(".$fila['character_maximum_length'].")";
        echo "</br>"; 

       if($cont>=1){
        
       if($tipo =='character(500)'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','URL',0);
             lista_campos.push(objeto);
            </script><?php
        }

       if($tipo =='character(250)'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Seleccion',0);
             lista_campos.push(objeto);
            </script><?php
        }

       if($tipo =='character(100)'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','File',0);
             lista_campos.push(objeto);
            </script><?php
        }

       if($tipo =='date'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Date_auto',0);
             lista_campos.push(objeto);
            </script><?php
        }

       if($tipo =='time'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Time_auto',0);
             lista_campos.push(objeto);
            </script><?php
        }

       if($tipo =='character(300)'){ 
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Email',0);
             lista_campos.push(objeto);
            </script><?php
        }
        
        if($tipo =='character(200)'){ 
        	echo "coincide = ".$campo; echo "</br></br>";
        	?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Text',0);
             lista_campos.push(objeto);
            </script><?php
        }

        if($tipo =='text'){ 
        	echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','TextArea',0);
             lista_campos.push(objeto);
            </script><?php
        }
        if($tipo =='integer()'){ echo "coincide = ".$campo; echo "</br></br>";
            echo "coincide = ".$campo; echo "</br></br>";
            ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Number',0);
             lista_campos.push(objeto);

            </script><?php
        }
       }
       $cont++;
    }
}


?>