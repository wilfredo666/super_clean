
 <?php
 require('../conector/conexion.php');

 $ID_usuario = $_POST['ID_usuario'];

 $query = pg_query("SELECT * FROM usuario WHERE id_usuario='$ID_usuario'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_usuario_edicion' value='<?php echo $ID_usuario; ?>'>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> email : </label>  
       <?php echo $email= trim($row['email']); ?> 
          <input type="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="(*)Escriba su email" onkeyup="validador_correo('email','resp_email',4)" maxlength="200" onkeypress="return valida_ambos(event);" ><div id="resp_email"></div>
          </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> password : </label>  
       <?php echo $password= trim($row['password']); ?> 
         
        <input type='text' class='form-control' id='password' value='<?php echo $password;?>' placeholder='(*)Escriba su password' onkeyup="validador_campo('password','resp_password',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_password'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sucursal : </label>  
       <?php  
              $sucursal= trim($row['sucursal']);  
              $sql_sucursal = pg_query("SELECT * FROM sucursal WHERE ID_sucursal='$sucursal'");$row_sucursal = pg_fetch_array($sql_sucursal);
              echo $row_sucursal['sucursal']; 

              ?>

               <select  id='sucursal' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                
               $sql_seleccion = pg_query("SELECT * FROM sucursal");
               while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                 $ID_campo = $row_seleccion['id_sucursal'];
                 $campo = $row_seleccion['sucursal'];?>
                 <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
                 <?php 
                } ?> 
               </select>
               <div id='resp_sucursal' > </div>
               </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> cargo : </label>  
              <?php 
               
              $cargo= trim($row['cargo']);  
              $sql_cargo = pg_query("SELECT * FROM cargo WHERE ID_cargo='$cargo'");$row_cargo = pg_fetch_array($sql_cargo);
              echo $row_cargo['cargo']; 

              ?>

               <select  id='cargo' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                
               $sql_seleccion = pg_query("SELECT * FROM cargo");
               while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                 $ID_campo = $row_seleccion['id_cargo'];
                 $campo = $row_seleccion['cargo'];?>
                 <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
                 <?php 
                } ?> 
               </select>
               <div id='resp_cargo' > </div>
               </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> nombres : </label>  
       <?php echo $nombres= trim($row['nombres']); ?> 
         
        <input type='text' class='form-control' id='nombres' value='<?php echo $nombres;?>' placeholder='(*)Escriba su nombres' onkeyup="validador_campo('nombres','resp_nombres',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_nombres'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> apellidos : </label>  
       <?php echo $apellidos= trim($row['apellidos']); ?> 
         
        <input type='text' class='form-control' id='apellidos' value='<?php echo $apellidos;?>' placeholder='(*)Escriba su apellidos' onkeyup="validador_campo('apellidos','resp_apellidos',4)" maxlength='100' onkeypress='return valida_letras(event);'>

        <div id='resp_apellidos'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> ci : </label>  
       <?php echo $ci= trim($row['ci']); ?> 
         <input type='number' class='form-control' id='ci' value='<?php echo $ci;?>' placeholder='(*)Escriba su ci' onkeyup="validador_campo('ci','resp_ci',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_ci'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> numero : </label>  
       <?php echo $numero= trim($row['numero']); ?> 
         <input type='number' class='form-control' id='numero' value='<?php echo $numero;?>' placeholder='(*)Escriba su numero' onkeyup="validador_campo('numero','resp_numero',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_numero'> </div>
         </div>
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_usuario.js'></script>
 
