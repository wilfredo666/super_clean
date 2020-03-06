
 <?php
 require('../conector/conexion.php');

 $ID_cliente = $_POST['ID_cliente'];

 $query = pg_query("SELECT * FROM cliente WHERE id_cliente='$ID_cliente'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> nombres : </label> </br>  
       <?php echo $nombres=$row['nombres']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> apellidos : </label> </br>  
       <?php echo $apellidos=$row['apellidos']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ci_nit : </label> </br>  
       <?php echo $ci_nit=$row['ci_nit']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label> </br>  
       <?php echo $celular=$row['celular']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label> </br>  
       <?php echo $telefono=$row['telefono']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> email : </label> </br>  
       <?php echo $email=$row['email']; ?> 

           </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

         <label> Tipo : </label> </br>  
         <?php echo $tipo = $row['tipo']; ?> 

        </div>

       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> descuento : </label> </br>  
       <?php echo $descuento=$row['descuento']; ?> 

           </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sexo : </label> </br>  
       <?php echo $sexo=$row['sexo']; ?> 

           </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cliente.js'></script>
 
