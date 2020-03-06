
    <div class='row' style='background:; margin: 0px; padding: 0px;'>
    <!-- Formulario de Busqueda-->
   
    <div class='col-lg-8 col-xs-12' style='margin: 0px; padding: 0px;' >
         <table class='table table-condensed' style='margin: 0px; padding: 0px;'>
          <tr>
            <td> 
              <input type='text' class='form-control' id='txt_buscar' placeholder='Buscar lavado' onkeyup ='cargar_datos_buscar(1);'>
            </td>
            <td>
              <button class='btn btn-default' onclick='cargar_datos_buscar(1);'> Buscar </button>
            </td>
          </tr>
         </table>
          <div id='resp_busqueda_lavado' ></div>
      </div>
      <div class='col-lg-4 col-xs-12' style='padding-top:1%;'>
       
      
      </div>
     
    <div class='col-lg-12 col-xs-12' style='background:white; padding:0px; margin:0px; color:#6E6E6E;'>
        
      <h4 style='margin-bottom:0px;'> Registros de lavado </h4>
      <p style='margin:0px; margin-bottom:3px; font-size: 10px;'> Listado de todos los datos registrados hasta la ultima fecha : </p>
              
      <div id='panel_listado_lavado'> 

       
      </div>
              
    </div>
   <!-- Final de row -->
</div>


<script src='../control/control_lavado_listado.js'> </script>
