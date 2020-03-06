    var cont = 0;

	function btn_ingresar_login()
	{
	  var email = $('#email').val();
	  var password = $('#password').val();
	  var sucursal = $('#sucursal').val();
	  var cargo = $('#cargo').val();
	  if(email!='' && password!='' && sucursal!='' && cargo!='')
	  {
	  	var ob = {email:email, password:password, sucursal:sucursal, cargo:cargo};
	     
	    $.ajax({
	                type: 'POST',
	                url:'../modelo/modelo_login.php',
	                data: ob,
	                beforeSend: function(objeto){ },
	                success: function(data)
	                { 
	                 $('#panel_respuesta_login').html(data);
	                 $('#email').val('');
					 $('#password').val('');
	                }
	             });
	  }

	  else{
	     var mensaje = '';
	    
	     if (password == ''){
	       	$('#password').focus();
	       	 mensaje = mensaje+' Debes escribir un password ';
	     }

	     if(email==''){
	      $('#email').focus();
	        mensaje = mensaje+' Debes escribir un email ';
	     }
	  	 
	  	 $('#panel_respuesta_login').html('<label>'+mensaje+'</label>');
	    }
	  
	 }


function btn_mostrar_password()
{
   var value = $("#password").val();
   
   var html = "";

     if(cont==0)
	 {
	    html = '<input type="text" class= "form-control" name="password" value="' + value + '" id="password"/>';
	    $('#password').after(html).remove();
	    cont = 1;
	 }
 
	 else
	 {
	    html = '<input type="password" class= "form-control" name="password" value="' + value + '" id="password"/>';
	    $('#password').after(html).remove();
	    cont = 0;

	 }

}
