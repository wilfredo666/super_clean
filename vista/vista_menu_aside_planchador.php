<ul class='link_nav'>

      <li class='link'>
      <a onclick="btn_mostrar_trabajo('panel_lavado');" > <i class='glyphicon glyphicon-bell fa-lg' id="icono"></i> Lavado  </a>
      <div style="display: none; background: transparent;" id="panel_lavado" >

            <ul class='link_nav'>
            <li class='link_submenu'> <a onclick='btn_lavado();' class="item"> Asignar Lavado </a> </li>
             <li class='link_submenu'> <a onclick='btn_lista_prendas_lavado();' class="item"> Lista Lavado </a> </li>
            </ul>
    
      </div>
      </li>
</ul>

<style type="text/css">
      .link{
      
        background: rgba(11,56,97,1);
        background: -moz-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(11,56,97,1)), color-stop(100%, rgba(14,68,112,1)));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        background: radial-gradient(ellipse at center, rgba(11,56,97,1) 0%, rgba(14,68,112,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0b3861', endColorstr='#0e4470', GradientType=1 );

        border-bottom: none;

      }
      .link:hover{
        background: #0B3861;
      }

      #icono{
       margin-right: 10%;
       color: orange;
      }
      .link_submenu{
            width: 100%;
            list-style: none;
            
            padding-left: 0%;
            margin:0px;
            padding: 5%;
            border-bottom: 1px solid orange;
            background: #0B243B;


      }

      .link_submenu:hover{
            background: #0B243B; 
      }

      .link a {
           text-shadow: 1px 1px 1px #29220A;
           color:white;
      }
      
      .link_submenu .item
      {
            font-size: 14px;
            padding: 3%;
            color:white;
            text-shadow: 1px 2px 3px black;
            /*background: #0b243b; */
            
      }

      .item:active
      {  
           color:#F7FE2E;
           font-weight: bold;
      }
      .item:hover
      {  
           color:orange;
      }
      .link_nav{
        background: #0A122A;
      }

</style>

<script type="text/javascript">
      var estado_submenu = false;

      function btn_mostrar_trabajo(panel)
      {      
            if(estado_submenu==false)
            { //alert("ingreso mostrar");
              $("#"+panel+"").show("slow");
              estado_submenu=true;
            }

            else{
             //alert("ingreso ocultar");
             $("#"+panel+"").hide("slow");
             estado_submenu=false;
          }    
      }

</script>
