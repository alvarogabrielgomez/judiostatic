<?php


require '../script/phpmailer/PHPMailerAutoload.php';
$mail_message = "<html>";
$mail_message .= "<head>";
$mail_message .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$mail_message .= "<style>
#qr-canvas{
    width:150px;
    height:150px;
    margin:auto;
    background-color:#eaeaea;
}

    .deal-info-metadata{
        padding: 0px 10PX;
        float: right;
        BOX-SIZING: BORDER-BOX;
        WIDTH: 100%;
      }

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
#code{
    text-align: center;
    box-sizing: border-box;
    background-color: #ffffd6;
    padding: 8px;
    font-size: 27px;
}

.deal-info-name{
    padding: 0px 18px;
    font-size: 16px;
    font-weight: 600;
    word-wrap: break-word;

  }
  .deal-info-box{
    padding: 4px 18px;
    font-size: 16px;
    height: fit-content;
    overflow-y: auto;
    word-wrap: break-word;
  }

  .buss-info-container{
    display: block;
    max-width: 467px;
    padding: 16px 11px 7px;
    margin: auto;
    margin-top: 25px;
    background-color: #ffffff;
    min-height: 101px;
    height: fit-content;
    overflow: auto;
    border: 1px solid rgba(151,37,21,0.29);

}

</style>

</head>

<body>
<div id='email-container'>
<p>Hola, $client_first $client_last,</p>
<p>Tu codigo promocional de <strong>$post_title</strong> fue escaneado, esperamos que disfrues tu promocion, y vuelve pronto :D</p>
<p>Puede revisar otros cupones mas en su perfil.</p>
<p>Muchisimas gracias,</p>
<p>Omeleth.</p>
</div>



</div>
    </body>
</html>

";




$email = 'noreply.ckj.cupon@gmail.com';
$password = 'cupon123456';
$to_id = $client_email;
$message = $mail_message;
$subject = 'Hola!, Esperamos que disfrute su cupon!';
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
