<?php
require '../../script/phpmailer/PHPMailerAutoload.php';
$mail_message = "<html>";
$mail_message .= "<head>";
$mail_message .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$mail_message .= "<style>
#qr-canvas{
    width:150px;
    height:150px;
    margin:auto;
    background-color:#eaeaea;}

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
    background-color: #efefef;
    border: 1px solid rgba(151, 37, 21, 0.29);
    border-top: 4px solid rgb(151, 37, 21);
}
#code{
    text-align: center;
    box-sizing: border-box;
    background-color: #ffffd2;
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
    height: 70px;
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
    overflow: auto;
    border: 1px solid rgba(151,37,21,0.29);

}

</style>

</head>

<body>
<div id='email-container'>
<p>Hola, $first $last,</p>
<p>Tu codigo promocional es:</p>
<p id='code'>$transqr</p>
<div id='qr-canvas'>
<img src='../../temp/qr.png' ></img>
</div>

<div class = 'buss-info-container'>
        <div class='deal-info-metadata'>
        <div class='deal-info-name'>$post_title</div>
        <div class='deal-info-box'>$post_desc</div>
        </div>
</div>

<p><br>Muestre este codigo al momento de llegar a $post_buss_name y su descuento se hara inmediatamente</p>
<p>Puede revisar otros cupones mas en su perfil.</p>
<p>Muchisimas gracias,</p>
<p>Judiostatic.</p>
</div>
    </body>
</html>

";




$email = 'noreply.ckj.cupon@gmail.com';
$password = 'cupon123456';
$to_id = $to_email;
$message = $mail_message;
$subject = 'Su cupon de descuento';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->setFrom('noreply.ckj.cupon@gmail.com', 'Judiostatic Cupon');
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {

}

?>
