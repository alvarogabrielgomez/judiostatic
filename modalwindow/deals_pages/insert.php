<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc.php';
?>
<div class="animated fadeIn insert-page">




<div class="header-insert">A nombre de quien ira este increible cupon?</div>
<div class="main-box admin-signup main-box-simple">

<div class="nav-signup">

<form method="POST" id="insert-form" action="./includes/insert-inc.php?id=<?php echo $post_url_id;?>" >
    <input id="first" type="text" name="first"  placeholder="Nombre" autofocus>
    <input id="first" type="text" name="last"  placeholder="Apellido">
    <input id="first" type="email" name="email"  placeholder="E-mail">
    <button id="btn_send" type="submit" class="button red" name="signup-submit">Completar pedido</button>
    <span style='' class="response"></span>
    <div><a class="cancelar">Cancelar</a></div>
<div><a class="volver"onClick="cargarContenido('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>')">Volver</a></div>

</form>

<canvas id="qr" style="margin: auto;display:none;"></canvas>

<script>
    $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });
    var cancelar = document.getElementsByClassName("cancelar")[0];
    cancelar.onclick = function() {
     modal.style.display = "none";
     cargarContenido('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>');
    }
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
    
});

var canvas = document.getElementById("qr");
var qruri = canvas.toDataURL("image/png");

function loadgif(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Casi esta listo</span>");

    }

loadgif();

$.ajax({url: 'modalwindow/deals_pages/saveqr.php?id=<?php echo $post_url_id;?>',
        type: 'POST', 
        data: { qruri: qruri },
        success: function(data) {
            console.log("Email Sended, Ckj1");
            cargarContenido('modalwindow/deals_pages/result.php?id=<?php echo $post_url_id;?>');
            
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
                    $(form).removeAttr("disabled");
                },
                error: function(data){
                    $(".response").text("Error arrecho");
                }
            });
        });
    });
</script>






</div>

</div> 


        
        <div>


        </div>

        
</div>

<p style="font-size: 12px;
    color: #a0a0a0;
    font-weight: 600;
    text-align: center;">Tus datos estan a salvo con nosotros, ni nosotros mismos tenemos acceso a ellos.</p>
