<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc-test.php';
$post_url_id = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas Omeleth</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="stylesheet" type="text/css" href="../../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../modalwindow.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
type="text/javascript" charset="utf-8"></script>
    
</head>

<div class="animated fadeIn insert-page">


<div class="modal-body" style="">
   AJAX CONTENT
</div>
<div id="modaltrigger" style="">

</div>


<div class="main-box admin-signup main-box-simple">

<div class="nav-signup">
<form method="POST" id="insert-form" action="../../includes/insert-inc.php?id=<?php echo $post_url_id;?>" >
    <input id="first" type="text" name="first"  placeholder="Name" autofocus>
    <input id="first" type="text" name="last"  placeholder="Surname">
    <input id="first" type="email" name="email"  placeholder="E-mail">
    <button id="btn_send" type="submit" class="button red" name="signup-submit">Next</button>
    <span style='' class="response"></span>

</form>
<canvas id="qr" style="margin: auto;display:none;"></canvas>
<script src="../../js/qrious.min.js"></script>
<script>
    $(function(){
        var form = $("#insert-form");
        form.submit(function(e){
            $(this).attr("disabled", "disabled");
            e.preventDefault();
            $.ajax({
                type: form.attr("method"), //post
                url: form.attr("action"), //insert-inc.php
                data: form.serialize(), //todos los datos del formulario
                dataType: "json", //response data type a json
                success: function(data){
                    $(".response").text(data.content);
                    if (data.response=="success") {
                        $(".response").css("color", "green");
                        $(".response").css("margin-top", "10px");
                        function success_redirect_load_delay(){
                    
                            $(".admin-signup").css("opacity", "0");
                            $(".main-body").css("display", "block");
                        }
                        setTimeout(success_redirect_load_delay, 600);

                        function success_redirect(){
                            
                            $(".admin-signup").css("display", "none");
                            
                            var transqr = data.transqr;

var qr = new QRious({
    element: document.getElementById('qr'),
    value: transqr,
    background: '#fbfbf2', // background color
    foreground: 'black', // foreground color
    backgroundAlpha: 1,
    foregroundAlpha: 1,
    level: 'L', // Error correction level of the QR code (L, M, Q, H)
    mime: 'image/png', // MIME type used to render the image for the QR code
    size: 150, // Size of the QR code in pixels.
    padding: null // padding in pixels
    
})

var canvas = document.getElementById("qr");
var qruri = canvas.toDataURL("image/png");

function loadgif(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='../../img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Sending code QR</span>");

    }
loadgif();
$.ajax({url: 'saveqrtest.php?id=<?php echo $post_url_id;?>',
        type: 'POST', 
        data: { qruri: qruri },
        success: function(data) {
            console.log("Email Sended, Ckj1");
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='../../img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Sending Code QR</span>");
        $(".modal-body").html("<span> EMAIL SENDED</span>");


        },
        error: function(data){
            console.log("Error Ajax, Ckj1");
            
        }

        
    })

                            
                        }
                        setTimeout(success_redirect, 2000);



                    }
                    else if (data.response!=="success") {
                        $(".response").css("color", "red");
                    }
                    $("input:submit").removeAttr("disable");
                },
                error: function(data){
                    $(".response").text("Error arrecho");
                }
            });
        });
    });
</script>



<script>
window.onload = function() {
  //funciones a ejecutar
  $(".main-body").css("display", "none");
};


  function cargarContenido(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='../../img/icons/loading.svg' class='loader' border='0' />");
        // cargamos la pagina en el div capa
        $(".modal-body").load(pagina);
    }
</script>






</div>

</div> 


        
        <div>


        </div>
</div>