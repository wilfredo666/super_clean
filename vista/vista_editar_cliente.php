
 <?php
 require('../conector/conexion.php');

 $ID_cliente = $_POST['ID_cliente'];

 $query = pg_query("SELECT * FROM cliente WHERE id_cliente='$ID_cliente'");
 while($row = pg_fetch_array($query))
  {
      ?> 
      <div class='row'>

      <input type='hidden' id='ID_cliente_edicion' value='<?php echo $ID_cliente; ?>'>
      
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

       <label> ci nit : </label>  
       <?php echo $ci_nit= trim($row['ci_nit']); ?> 
         
        <input type='text' class='form-control' id='ci_nit' value='<?php echo $ci_nit;?>' placeholder='(*)Escriba su ci_nit' onkeyup="validador_campo('ci_nit','resp_ci_nit',4)" maxlength='10' onkeypress='return valida_numeros(event);'>

        <div id='resp_ci_nit'> </div>
        </div>
        
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> celular : </label>  
       <?php echo $celular= trim($row['celular']); ?> 
         <input type='number' class='form-control' id='celular' value='<?php echo $celular;?>' placeholder='(*)Escriba su celular' onkeyup="validador_campo('celular','resp_celular',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_celular'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> telefono : </label>  
       <?php echo $telefono= trim($row['telefono']); ?> 
         <input type='number' class='form-control' id='telefono' value='<?php echo $telefono;?>' placeholder='(*)Escriba su telefono' onkeyup="validador_campo('telefono','resp_telefono',4)" maxlength='10' min='0' onkeypress='return valida_numeros(event);'>

         <div id='resp_telefono'> </div>
         </div>
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> email : </label>  
       <?php echo $email= trim($row['email']); ?> 
          <input type="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="(*)Escriba su email" onkeyup="validador_correo('email','resp_email',4)"" maxlength="200" onkeypress="return valida_ambos(event);" ><div id="resp_email"></div>
          </div>
      
       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> descuento : </label>  
       <?php echo $descuento= trim($row['descuento']); ?> 
          <input type="email" class="form-control" id="descuento" value="<?php echo $descuento;?>" placeholder="(*)Escriba su descuento" onkeyup="validador_correo('descuento','resp_descuento',4)"" maxlength="200" onkeypress="return valida_ambos(event);" ><div id="resp_descuento"></div>
       </div>

      <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> tipo : </label>  
       <?php echo $tipo = trim($row['tipo']); ?> 
       <select class="form-control" id="tipo">
                 <option> Seleccione </option>
                 <option> Normal </option>
                 <option> Vip </option>
               </select>
          
       </div>


       <div class='col-lg-6 col-sm-6 col-xs-12'>

       <label> sexo : </label>  
       <?php echo $sexo= trim($row['sexo']); ?> 
         
       <select class="form-control" id='sexo'>
        <option> Seleccione </option>
        <option> MASCULINO </option>
        <option> FEMENINO </option>
       </select>

        <div id='resp_sexo'> </div>
        </div>
        
      </div>
    <?php
  }

 ?>
 <!-- final div row -->
 </div>
 <script type='text/javascript' src='../control/control_editar_cliente.js'></script>
 
