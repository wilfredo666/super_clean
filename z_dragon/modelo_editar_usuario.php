<script type="text/javascript">
 //Creacion de variables a usar 
  var lista_campos=[];
  
  //creamos el objeto
  function formulario(campo, tipo,id) {
    this.campo = campo;
    this.tipo = tipo;
    this.id = id;
  }
</script>
<?php

require '../conector/conexion.php';

$resultado = pg_query("SELECT column_name,data_type,character_maximum_length FROM information_schema.columns WHERE table_schema = 'public' AND table_name = 'usuario'");

if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . pg_error();
    exit;
}
if (pg_num_rows($resultado) > 0) {
	$cont=0;
    while ($fila = pg_fetch_assoc($resultado)) {
       // print_r($fila);
        echo $campo = $fila['column_name']; 
        echo " - ";
        echo $tipo = $fila['data_type']; 
        echo " - ";
        echo $size = $fila['character_maximum_length']; 
        echo "</br>";
        
        if($cont>=1){
        
        if($tipo =='character' && $size =='200'){ 
        	echo "coincide = ".$campo; echo "</br></br>";
        	?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Text',0);
             lista_campos.push(objeto);
            </script><?php
        }

        if($tipo =='character' && $size =='300'){ 
          echo "coincide = ".$campo; echo "</br></br>";
          ?><script type="text/javascript">
             var objeto = new formulario('<?php echo $campo ?>','Email',0);
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
        if($tipo =='integer'){ echo "coincide = ".$campo; echo "</br></br>";
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

<script type="text/javascript">
  mostrar_campos(); 
  
  function mostrar_campos()
  {  
    var cadena="<table class='table table-bordered table-condensed table-hover'>";
    var cadena = cadena+"<tr > <th> <center> Campo </center> </th> <th> <center> Tipo </center></th> <th> <center> Opcion </center></th> </tr>";

    for (var i = 0; i < lista_campos.length; i++) {
      cadena = cadena +"<tr align='center'> <td> "+lista_campos[i].campo+" </td> <td> "+lista_campos[i].tipo+"</td> <td> <button class='btn btn-danger btn-xs' onclick='borrar()'> Eliminar </button></td> </tr>";
    }
    var cadena = cadena+"</table>";
    $("#resultado_form").html(cadena);
  }

</script>