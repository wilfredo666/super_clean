<?php
    
  $DB_HOST = 'localhost'; //Host de postgresql (puede ser otro)
  $DB_USER = 'postgres'; //Usuario de postgresql (puede ser otro)
  $DB_PASS = 'toor'; //Password de postgresql (puede ser otro)
  $DB_NAME = 'superclean'; //Database de postgresql (puede ser otra)
  $DB_PORT = '5432'; //Puerto de postgresql (puede ser otro)

$conn = pg_connect("user=".$DB_USER." port=".$DB_PORT." dbname=".$DB_NAME." host=".$DB_HOST." password=".$DB_PASS)
or die('No se pudo conectar: ' . pg_last_error());

?>