<?php

require '../libreria/Mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();                                         // Activamos SMTP para mailer
$mail->Host = 'smtp.gmail.com';                         // Especificamos el host del servidor SMTP
$mail->SMTPAuth = true;                                // Activamos la autenticacion
$mail->Username = 'superclean.sucursal.2@gmail.com';       // Correo SMTP
$mail->Password = 'sucursalpapapaulo2019';                  // Contraseña SMTP
$mail->SMTPSecure = 'ssl';                          // Activamos la encriptacion ssl
$mail->Port = 465;                                 // Seleccionamos el puerto del SMTP
$mail->From = 'superclean.sucursal.2@gmail.com';
$mail->FromName = 'SUPERCLEAN';  // Nombre del que envia el correo
$mail->isHTML(true);        //Decimos que lo que enviamos es HTML
$mail->CharSet = 'UTF-8';  // Configuramos el charset 

$mensaje_enviar = trim($_POST['mensaje']);
$email_enviar = trim($_POST['correo']);
enviarMail($email_enviar,"AVISO DE SERVICIO SUPERCLEAN",$mensaje_enviar);

function enviarMail($destinatarios,$asunto,$mensaje){
	global $mail;

	//Agregamos a todos los destinatarios

    $mail->addAddress($destinatarios,"Notificacion");
	
	//Añadimos el asunto del mail
	$mail->Subject = $asunto; 

	//Mensaje del email
	$mail->Body  = '<div align="center" style="color:blue;"> <h1> Servicio de Limpieza SUPER CLEAN </h1> </div>'.
	
    $mensaje="<article style='font-size:16px;color:black;'>".$mensaje."</article>";
	//comprobamos si el mail se envio correctamente y devolvemos la respuesta al servidor
	
	?>
   <div class='alert alert-success' role='alert'>
   <strong> CORRECTO!! </strong> Se envio el Correo
   </div>
   <script type="text/javascript">
   	    setTimeout(function(){
         $('#panel_respuesta_envio_correo_electronico').html("");
        },2000);
   </script>
   <?php
	 
	if(!$mail->send()) {
		echo " Se envio el correo correctamente";
		return false;
	} else {
		return true;
		echo "No se pudo enviar el correo electronico";
	} 
     }

 ?>