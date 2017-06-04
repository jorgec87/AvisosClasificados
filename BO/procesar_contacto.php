<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        $error="";

        // valida que todos los datos sean recibidos correctamente
        if(!isset($_POST['nombre'])) {
                $error="Ocurrio un problema con el nombre ingresado";
        }else{ 
                $nombre=$_POST['nombre'];
        }

        if(!isset($_POST['email'])) {
                $error="Ocurrio un problema con el correo electronico ingresado";
        }else{
                $email=$_POST['email'];
        }

        if(!isset($_POST['telefono'])) {
                $error="Ocurrio un problema con el telefono de contacto ingresado";
        }else{
                $telefono=$_POST['telefono'];
        }

        if(!isset($_POST['consulta'])) {
                $error="la consulta ingresada contiene algun error";
        }else{
                $consulta=$_POST['consulta'];
        }
         
        $nuestroEmail="avisos.clasificados.g@gmail.com";
        //password del correo: avisos2017
        // fin validacion de datos recibidos

        // confirma que no existan errores
        if ($error=="") {
// CORREO DE CONFIRMACION DE CONSULTA            
date_default_timezone_set('Etc/UTC');
require 'C:/xampp/htdocs/AvisosClasificados/PHPMailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging

$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $nuestroEmail;
//Password to use for SMTP authentication
$mail->Password = "avisos2017";
//Set who the message is to be sent from
$mail->setFrom($nuestroEmail, 'Avisos Clasificados Gratis');
//Set who the message is to be sent to
$mail->addAddress($email, $nombre);
//Set the subject line
$mail->Subject = 'Consulta a Avisos Clasificados Gratis';
//Replace the plain text body with one created manually
$mail->Body =    "Gracias por comunicarte con nosotros<br>
                    Hemos recibido su consulta sr(a)".$nombre.".<br>
                    Le Responderemos a la brevedad.<br>
                    Saludos,<br>
                    Avisos Clasificados Gratis.<br>";
 //FIN CORREO DE CONFIRMACION DE CONSULTA    

// CORREO DE CONSULTA PARA RESPONDER           

$mail2 = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail2->isSMTP();
//Enable SMTP debugging

$mail2->Debugoutput = 'html';
//Set the hostname of the mail server
$mail2->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail2->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail2->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail2->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail2->Username = $nuestroEmail;
//Password to use for SMTP authentication
$mail2->Password = "avisos2017";
//Set who the message is to be sent from
$mail2->setFrom($nuestroEmail, 'Avisos Clasificados Gratis');
//Set who the message is to be sent to
$mail2->addAddress($nuestroEmail, 'Avisos Clasificados Gratis Notificaciones');
//Set the subject line
$mail2->Subject = 'Consulta de cliente generada por formulario';
//Replace the plain text body with one created manually
$mail2->Body  =    "Se ha generado una consulta por un cliente.<br>
                    Sus datos son:<br><br>
                    Nombre: <strong>".$nombre."</strong><br>
                    Correo Electronico:<strong>".$email."</strong><br>
                    Telefono: <strong>".$telefono."</strong><br>
                    Consulta: <strong>".$consulta."</strong><br>
                    Responder A la brevedad!.<br>
                    Saludos.<br>";  

if (!$mail->send()) {
    echo "****************MENSAJE UNO NO ENVIADO**********************!";
    echo "Mailer Error: " . $mail->ErrorInfo;
    
} elseif (!$mail2->send()) {
     echo "****************MENSAJE DOS NO ENVIADO**********************!";
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("location: ../contacto.php?res=1");
}
  
        }else
        {
            echo $error;   
        }
        // fin confirmacion error
        
  