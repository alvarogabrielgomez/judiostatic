<?php


require '../script/phpmailer/PHPMailerAutoload.php';
$mail_message = "<html>";
$mail_message .= "<head>";
$mail_message .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$mail_message .= "<style>


#email-container{
    max-width: 600px;
    width: 100%;
    height: auto;
    padding: 20px 44px;
    margin: auto;
    display: block;
    font-size: 16px;
    font-family: helvetica;
    border-radius: 10px 10px 0px 0px;
    background-color: #fbfbf2;
    border: 1px solid rgba(151, 37, 21, 0.29);
    border-top: 4px solid rgb(151, 37, 21);
}

.button {
    border-radius:50px;
    background-color: #22BA6A;
    border: none;
    color: white;
	padding: 12px 39px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	font-size: 16px;
	height: auto;
	box-sizing: border-box;
	box-shadow: 0px 0px 4px 0px rgba(209,209,209,1);
    cursor: pointer;
    margin:auto;
}

.red {
	background-color: #BC2D19!important;
	transition: all 0.4s ease;
	box-shadow: 1px 1px 6px 0px rgba(128, 128, 128, 0.49)!important;
	border: 1px solid #bc2d1942;
}

.red:hover{
	background-color: rgb(207, 49, 28)!important;
	transition: all 0.4s ease;
	box-shadow: 0px 0px 4px 0px rgb(184, 184, 184)!important;
}

.red a{
	color: #fff;
}



</style>

</head>

<body>
<div id='email-container'>
<p>Hola!, lamentamos que no pudieras entrar a tu cuenta</p>
<p>Pero descuida, rapidamente podras recuperarla haciendo click en el link de abajo</p>
</br>
<p><a class='button red' href='".$url."'>Recuperar contrasena</a></p>
</br>
<p>Si el link no funciona puedes copiar y pegar el link de abajo en tu barra de direcciones</p>
</br>
<p><a href='".$url."'>".$url."</a></p>
</br>
<p>Muito obrigado</p>
<p>Omeleth Cupon.</p>
<br>
<p style='text-align:center;font-size:12px;'>Recibiste este Email porque solicitaste un reseteo de contrasena en <a href='https://omeleth.com'>Omeleth.com</a></br>
Si esto no fue asi ignora este email y eliminalo inmediatamente.
</p>

</div>
    </body>
</html>

";




$email = 'noreply.ckj.cupon@gmail.com';
$password = 'cupon123456';
$message = $mail_message;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->setFrom('noreply.ckj.cupon@gmail.com', 'Omeleth Cupon');
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->IsHTML(true);
$mail->Body = $message;
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {

}

?>
