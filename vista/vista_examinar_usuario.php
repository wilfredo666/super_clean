
 <?php
 require('../conector/conexion.php');

 $ID_usuario = $_POST['ID_usuario'];

 $query = pg_query("SELECT * FROM usuario WHERE id_usuario='$ID_usuario'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> email : </label> </br>  
       <?php echo $email=$row['email']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> password : </label> </br>  
       <?php echo $password=$row['password']; ?> 

       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>
       <label> sucursal : </label> </br>  
       <?php

         $id_sucursal = $row['sucursal'];
         $sql_suc = pg_query("SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'");
         $row_suc = pg_fetch_array($sql_suc);
         echo $sucursal = $row_suc['sucursal'];

       ?> 
       </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cargo : </label> </br>  
       <?php   

         $id_cargo = $row['cargo'];
         $sql_carg = pg_query("SELECT * FROM cargo WHERE id_cargo = '$id_cargo'");
         $row_carg = pg_fetch_array($sql_carg);
         echo $cargo = $row_carg['cargo'];

       ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> nombres : </label> </br>  
       <?php echo $nombres=$row['nombres']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> apellidos : </label> </br>  
       <?php echo $apellidos=$row['apellidos']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ci : </label> </br>  
       <?php echo $ci=$row['ci']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> numero : </label> </br>  
       <?php echo $numero=$row['numero']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_usuario.js'></script>
 
