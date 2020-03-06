
   
   <div class='row' style='margin:0px; padding:0px;'> 
  
    <h2 align='center'>usuario</h2>
    <label> Todos los campos con (*) son obligatorios </label> </br>
    
               <div class='col-lg-6 col-xs-6'> 
               
               <label>email</label></br>
               <input type='text' id='email' class='form-control' placeholder='(*)Escriba su email' onkeyup="validador_correo('email','resp_email',2)" maxlength='200' min='0' onkeypress='return valida_ambos(event);'>

               <div id='resp_email' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>password</label></br>
              <input type='text' id='password' class='form-control' placeholder='(*)Escriba su password' onkeyup="validador_campo('password','resp_password',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_password'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>sucursal</label></br>
               <select  id='sucursal' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                require '../conector/conexion.php';
               $sql_seleccion = pg_query("SELECT * FROM sucursal");
               while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                 $ID_campo = $row_seleccion['id_sucursal'];
                 $campo = $row_seleccion['sucursal'];?>
                 <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
                 <?php 
                } ?> 
               </select>

               <div id='resp_sucursal' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label>cargo</label></br>
               <select  id='cargo' class='form-control'>
                <option value=''> Seleccione </option> <?php 
                require '../conector/conexion.php';
               $sql_seleccion = pg_query("SELECT * FROM cargo");
               while ($row_seleccion = pg_fetch_array($sql_seleccion)) 
                {
                 $ID_campo = $row_seleccion['id_cargo'];
                 $campo = $row_seleccion['cargo'];?>
                 <option value ='<?php echo $ID_campo;?>'><?php echo $campo; ?></option> 
                 <?php 
                } ?> 
               </select>

               <div id='resp_cargo' ></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>nombres</label></br>
              <input type='text' id='nombres' class='form-control' placeholder='(*)Escriba su nombres' onkeyup="validador_campo('nombres','resp_nombres',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_nombres'></div>
               </div> 
               
              <div class='col-lg-6 col-xs-6'> 
              
              <label>apellidos</label></br>
              <input type='text' id='apellidos' class='form-control' placeholder='(*)Escriba su apellidos' onkeyup="validador_campo('apellidos','resp_apellidos',4)" maxlength='200' onkeypress='return valida_ambos(event);'>

               <div id='resp_apellidos'></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label> ci </label></br>
               <input type='text' id='ci' class='form-control' placeholder='(*)Escriba su ci' onkeyup="validador_campo('ci','resp_ci',2)" maxlength='10' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_ci' ></div>
               </div> 
               
               <div class='col-lg-6 col-xs-6'> 
               
               <label> celular </label></br>
               <input type='text' id='numero' class='form-control' placeholder='(*)Escriba su numero' onkeyup="validador_campo('numero','resp_numero',2)" maxlength='8' min='0'  onkeypress='return valida_numeros(event);'>

               <div id='resp_numero' ></div>
               </div> 
               </br><hr>

   <div id='resultado_registro_usuario'></div> 
   
   </div>
   <script type='text/javascript' src='../control/control_usuario.js'></script>
