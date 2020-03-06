<?php

    $bd_host = "localhost";        // se coloca la direccion del servidor de base de datos
    $bd_usuario = "root";    // el alias de la cuenta creada de la base de datos
    $bd_password = "";          // la contrasena de la cuenta
    $bd_base = "bd_clean";   // el nombre de la base de datos
 
	$con1 = mysql_connect($bd_host, $bd_usuario,$bd_password); 
	mysql_select_db($bd_base, $con1);
	mysql_set_charset('utf8'); 

    if($con1==TRUE){
    echo "coneccion existosa";
    }
 
 $sql_p = mysql_query("SELECT * FROM articulo");

  $DB_HOST = 'localhost'; //Host de postgresql (puede ser otro)
  $DB_USER = 'postgres'; //Usuario de postgresql (puede ser otro)
  $DB_PASS = 'root'; //Password de postgresql (puede ser otro)
  $DB_NAME = 'bd_sclean'; //Database de postgresql (puede ser otra)
  $DB_PORT = '5432'; //Puerto de postgresql (puede ser otro)

  $conn = pg_connect("user=".$DB_USER." port=".$DB_PORT." dbname=".$DB_NAME." host=".$DB_HOST." password=".$DB_PASS)
  or die('No se pudo conectar: ' . pg_last_error());
  
   $sql_cli = mysql_query("SELECT * FROM cliente");
   $num=0;
   while ($row_cli = mysql_fetch_array($sql_cli)) {
     $num++;
     $cliente = trim($row_cli['nomb']);
     $nit = trim($row_cli['nit']);
     $tel = trim($row_cli['telf']);

     if ($cliente!="") {
        echo $num; echo ".- "; echo $cliente; echo " - "; echo $nit; echo " - "; echo $tel; echo "</br>";

        $sql_insert = pg_query("INSERT INTO cliente(nombres, apellidos, ci_nit, celular, telefono, email, descuento, sexo, tipo) VALUES ( '$cliente', '', '$nit', '$tel',0, '', 0, '', 'NORMAL')");
     }

   }

?>