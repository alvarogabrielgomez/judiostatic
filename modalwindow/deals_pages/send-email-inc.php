<script>
var canvas = document.getElementById("qr");
var imageqr = canvas.toDataURL("image/png");

</script>
<?php

$qruri = '

';


ini_set("SMTP","ssl:smtp.gmail.com" );
ini_set("smtp_port","465");
ini_set('sendmail_from', 'alvarogabrielgomez@gmail.com');  
        $qruri='data:image/png;base64,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';
        $encoding = "iso-8859-1";
        $from_mail = "alvarogabrielgomez@gmail.com";
        $from_name = "Alvaro Gomez";
        $mail_subject = "TEST";
        $mail_to = "ckj1studios@gmail.com";
        $updated_at = $row['updated_at'];
    // Preferences for Subject field
    $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
    );

    $mail_message = "
    <html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <style>
    #qr-canvas{
        background-image:url(data:image/png;base64,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);
    }
    </style>
    </head>
  
    <body>

    <p>Hola, $first $last,</p>
    <p>Tu codigo promocional es:</p>
    <p>$transqr</p>
    <p><br>Muestre este codigo al momento de llegar a $buss_name y su descuento se hara inmediatamente</p>
    <p>Puede revisar otros cupones mas en su perfil.</p>
    <p>Muchisimas gracias,</p>
    <p>Judiostatic.</p>
        </body>
</html>
    
    ";

    // Mail header
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$from_name." <".$from_mail."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

    // Send mail
    mail($mail_to, $mail_subject, $mail_message, $header);





//     The 'sendmail' executable which PHP uses on Linux/Mac (not Windows) expects "\n" as a line separator.
// This executable is a standard, and emulated by other MTAs.
// "\n" is confirmed required for qmail and postfix, probably also for sendmail and exim but I have not tested.
// If you pass through using "\r\n" as a separator it may appear to work, but your email will be subtly corrupted and some middleware may break. It only works because some systems will clean up your mistake.
// If you are implementing DKIM be very careful, as DKIM checks will fail (at least on popular validation tools) if you screw this up. DKIM must be calculated using "\r\n" but then you must switch it all to "\n" when using the PHP mail function.
// On Windows, however, you should use "\r\n" because PHP is using SMTP in this situation, and hence the normal rules of the SMTP protocol (not the normal rules of Unix piping) apply.