<?php
if (isset($_FILES['file'])) 
{
    $archivo = $_FILES['file'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $time = time();
    $nombre = "d-$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "../multimedia/documentos/$nombre")) {
        //echo 1;
         echo $nombre;
        ?>
          
        <?php
    } else {
        echo 0;
    }
}
?>