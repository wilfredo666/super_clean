<!DOCTYPE html>
<html>
<head>
  <title>Sigfrid 2.0 </title>
  
  <link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilos_frame.css">
  <script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="sigfrid.png" />

</head>
<body>

<header>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="link-item-titulo" href="#"> Sigfrid 2.0 </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a id="link-item" href="#"> Caracteristicas</a></li>
      </ul>
  
      <ul class="nav navbar-nav navbar-right">
        <li><a id="link-item" href="index_usuario.php"> Usuarios </a></li>
        <li><a id="link-item" href="index_area.php"> Areas  </a></li>
        <li><a id="link-item" href="index_edicion.php"> Edicion </a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<div class="row">
  
  <div class="col-lg-3 col-md-3 col-xs-4" style="border:1px solid #BDBDBD; margin: 3px;">
  <div class="container-fluid">
  </br>    
  <p> USUARIO Area Aplicativa </p>
  <h6 style="font-size: 10px; margin-bottom: 1%;"> Se recomienda que se registre los datos principales como email y password </h6>
  <input type="text" id="area" class="form-control" value="usuario" disabled="true" style="background: transparent;">
 
  <p> Campo del formulario </p>
    <input type="text" id="campo" class="form-control" maxlength="">
  <p> Seleccione el tipo  </p>
  
  <div class="caja">
    <select id="opcion_campo" class="form-control" >

      <option> Tipo </option>
      <option> Text </option>
      <option> Number </option>
      <option> TextArea </option>
      <option onclick="select_campo();"> Seleccion </option>
      <option> Password </option>
      <option> Email </option>
      <option> File </option>
      <option> Time </option>
      <option> Date </option>
      <option> Time_auto </option>
      <option> Date_auto </option>
      <option> URL </option>
    </select>
    <div id="panel_seleccion"></div>
  </div>
  </br>
    
  <button class="btn btn-success" style="width: 100%;" onclick="btn_agregar_campos()">  Agregar  </button>
  
  </br>
  </br>
  <h5 style="font-weight:; /*font-style: oblique; */ text-align: center; font-size: 11px;"> Preciona el boton de generar funcionalidades para que se crea tu area de aplicacion web </h5>

    <center>
      <button class="btn btn-primary" style="width: 100%;" onclick="generar_code()"> Generar Funcionalidad del sistema </button>
    </center>
    <hr>

    </div>
  </div>
  
  <div class="col-lg-8 col-md-8 col-xs-8">
    <table class="table table bordered table condensed">
      <tr>
        <td class="col-lg-6 col-md-6 col-xs-6">
           <div id="resultado_form"></div>
        </td>
        <td class="col-lg-6 col-md-6 col-xs-6" >
           <div id="resultado_form_code"></div>
        </td>
      </tr>
    </table>
   
  </div>

</div>
</body>
</html>

<script type="text/javascript">
  //Creacion de variables a usar 

  var lista_campos=[];
  
  //creamos el objeto
  function formulario(campo, tipo,id) {
    this.campo = campo;
    this.tipo = tipo;
    this.id = id;
  }

  function btn_agregar_campos() {  
    var campo = $("#campo").val();
    var tipo = $("#opcion_campo").val();
    var id = $("#id").val();
    
    var obj = new formulario(campo,tipo,0);
    lista_campos.push(obj);
    mostrar_campos();   
  }

  function select_campo()
  { 
    var select = $("#opcion_campo").val();
    var ob="";
      $.ajax({
       type: "POST",
       url:"generar_selects.php",
       data: ob,
       beforeSend: function(objeto){  },
       success: function(data)
       { 
         $("#panel_seleccion").html(data);
        }
     });
  }

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

  function generar_code()
  {
    var area=$("#area").val();
    var lista = JSON.stringify(lista_campos);

     var ob={lista : lista, area:area};
            
            $.ajax({
                type: "POST",
                url:"generar_code_usuario.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_form_code").html(data);
 
                }
             });
  }

  function borrar()
  { lista_campos.pop();
    
    var cadena="<table class='table table-bordered table-condensed table-hover'>";
    var cadena = cadena+"<tr > <th> <center> Campo </center> </th> <th> <center> Tipo </center></th> <th> <center> Opcion </center></th> </tr>";

    for (var i = 0; i < lista_campos.length; i++) {
      cadena = cadena +"<tr align='center'> <td> "+lista_campos[i].campo+" </td> <td> "+lista_campos[i].tipo+"</td> <td> <button class='btn btn-danger btn-xs' onclick='borrar()'> Eliminar </button></td> </tr>";
    }
    var cadena = cadena+"</table>";
    $("#resultado_form").html(cadena);
  }
 
  btn_mostrar_variables_usuario();
  
  function btn_mostrar_variables_usuario()
  {
    var ob="";
      $.ajax({
       type: "POST",
       url:"modelo_editar_usuario.php",
       data: ob,
       beforeSend: function(objeto){  },
       success: function(data)
       { 
         $("#resultado_form").html(data);
        }
     });
  }

</script>