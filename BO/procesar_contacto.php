<?php
        require_once '../EasyPDO/conexionPDO.php';
        require_once '../config.php';
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
         
       
        // fin validacion de datos recibidos

        // confirma que no existan errores
        if ($error=="") {
            
            // CORREO DE CONFIRMACION DE CONSULTA            
date_default_timezone_set('Etc/UTC');
require 'C:/xampp/htdocs/AvisosClasificados/PHPMailer/PHPMailerAutoload.php';

// CORREO DE CONSULTA PARA RESPONDER           

$mail2 = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail2->isSMTP();
//Enable SMTP debugging

$mail2->Debugoutput = 'html';
//Set the hostname of the mail server
$mail2->Host = 'smtp.gmail.com';

// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail2->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail2->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail2->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail2->Username = $conf['email'];
//Password to use for SMTP authentication
$mail2->Password = $conf['email_password'];
//Set who the message is to be sent from
$mail2->setFrom($conf['email'], 'Avisos Clasificados Gratis');
//Set who the message is to be sent to
$mail2->addAddress($email, 'Avisos Clasificados Gratis Notificaciones');
//Set the subject line
$mail2->Subject = 'Consulta de cliente generada por formulario';
//Replace the plain text body with one created manually
$mail2->isHTML(true); 
$mail2->Body  =    "        <!DOCTYPE html>
<html>
<head>
<meta http-equiv = \"Content-Type\" content = \"text/html; charset=UTF-8\" />
<title>uiBox</title>
</head>
<body leftmargin = \"0\" marginwidth = \"0\" topmargin =\"0\" marginheight = \"0\" offset = \"0\" style = \"
	background-color: #f6f6f6;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
\">
<div style = \"
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 70px 0 70px 0;
\">
<table border = \"0\" cellpadding = \"0\" cellspacing =\"0\" height = \"100%\" width =\"100%\">
<tr>
<td align =\"center\" valign = \"top\">
<div id = \"template_header_image\">
<p style = \"margin-top:0;\"><img width=\"150\" height=\"150\"  src =\"http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png\" alt = \"uiBox\" /></p> </div>
<table border = \"0\" cellpadding = \"0\" cellspacing = \"0\" width = \"520\" id = \"template_container\" style = \"
	box-shadow:0 0 0 1px #f3f3f3 !important;
	border-radius:3px !important;
	background-color: #ffffff;
	border: 1px solid #e9e9e9;
	border-radius:3px !important;
	padding: 20px;
\">
<tr>
<td align = \"center\" valign = \"top\">
<!--Header -->
<table border = \"0\" cellpadding = \"0\" cellspacing = \"0\" width = \"520\" id = \"template_header\" style = \"
	color: #00000;
	border-top-left-radius:3px !important;
	border-top-right-radius:3px !important;
	border-bottom: 0;
	font-weight:bold;
	line-height:100%;
	text-align: center;
	vertical-align:middle;
\" bgcolor = \"#ffffff\">
<tr>
<td>
<h1 style = \"
	color: #000000;
	margin:0;
	padding: 28px 24px;
	display:block;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	font-size:32px;
	font-weight: 500;
	line-height: 1.2;
\">Contacto</h1>
</td>
</tr>
</table>
<!--End Header -->
</td>
</tr>
<tr>
<td align = \"center\" valign = \"top\">
<!--Body -->
<table border = \"0\" cellpadding = \"0\" cellspacing = \"0\" width = \"520\" id = \"template_body\">
<tr>
<td valign = \"top\" style = \"
	border-radius:3px !important;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
\">
<!--Content -->
<table border = \"0\" cellpadding = \"20\" cellspacing = \"0\" width = \"100%\">
<tr>
<td valign = \"top\">
<div style =\"
	color: #000000;
	font-size:14px;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	line-height:150%;
	text-align:left;
\"><p><strong>De:</strong> ".$nombre."</strong>, </p>
   <p><strong>Fono:</strong> ".$telefono.", </p>
   <p><strong>Email:</strong> ".$email.", </p><br>
<p>".$consulta."</p>

</div>
</td>
</tr>
</table>
<!--End Content -->
</td>
</tr>
</table>
<!--End Body -->
</td>
</tr>
<tr>
<td align = \"center\" valign = \"top\">
<!--Footer -->
<table border = \"0\" cellpadding = \"10\" cellspacing = \"0\" width = \"600\" id = \"template_footer\" style = \"
	border-top:0;
	-webkit-border-radius:3px;
\">
<tr>
<td valign = \"top\">
<table border = \"0\" cellpadding = \"10\" cellspacing = \"0\" width = \"100%\">
<tr>
<td colspan = \"2\" valign = \"middle\" id = \"credit\" style = \"
	border:0;
	color: #000000;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	font-size:12px;
	line-height:125%;
	text-align:center;
\">
<p><a href = \"http://localhost/AvisosClasificados/\">Avisos Clasificados</a></p>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!--End Footer -->
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>
</html>"; 

if (!$mail2->send()) {
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
        
  