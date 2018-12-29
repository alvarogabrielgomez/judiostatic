<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'deals_pages-inc.php';

?>
<div class="animated fadeIn insert-page">




<div class="main-box admin-signup main-box-simple">

<div class="nav-signup">
<form method="POST" id="insert-form" action="modalwindow/deals_pages/insert-inc2.php?id=<?php echo $post_url_id;?>" >
    <input id="first" type="text" name="first"  placeholder="Nombre" autofocus>
    <input id="first" type="text" name="last"  placeholder="Apellido">
    <input id="first" type="email" name="email"  placeholder="E-mail">
    <span class="response"></span>
    <button id="btn_send" type="submit" class="button red" name="signup-submit">Completar pedido</button>
    <div><a class="cancelar">Cancelar</a></div>
<div><a class="volver"onClick="cargarContenido('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>')">Volver</a></div>
</form>

<script>
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

                        function success_redirect_load_delay(){
                    
                            $(".admin-signup").css("opacity", "0");
                        }
                        setTimeout(success_redirect_load_delay, 600);

                        function success_redirect(){
                            
                            $(".admin-signup").css("display", "none");
                            cargarContenido('modalwindow/deals_pages/result.php?id=<?php echo $post_url_id;?>');
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






</div>

</div> 


        
        <div>


        </div>
</div>