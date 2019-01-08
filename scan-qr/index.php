<div id="preview-container">
<video id="preview"></video>
<audio id="audio" src="scan-qr/beep-07.wav" autoplay="false" ></audio>

<span style='' class="response">Esperando...</span>
<img style='float:none!important; display:none;margin:auto;' src='./img/icons/loading.svg' class='loader'/>
<div class='info-container'>
<span style='' class="client_name">Nombre del Cliente</span>
</div>
<div class='info-container'>
<span style='' class="post_title">Promocion</span>
</div>
<div class='info-container'>
<span style='' class="post_price_new">Precio nuevo</span>
</div>
<div class='info-container'>
<span style='' class="post_buss_name">Empresa</span>
</div>
</div>



    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ 
          video: document.getElementById('preview'),
            mirror:false,
            backgroundScan: false,
          
        });

      scanner.addListener('scan', function (content) {
        console.log(content);
        playBeep();
        $(".response").text("Procesando...");
        $(".loader").css("display", "block");

        $(".info-container").css("display", "none");
        $(".client_name").css("display", "none");
        $(".post_title").css("display", "none");
        $(".post_buss_name").css("display", "none");
        $(".post_price_new").css("display", "none");
 ajax = $.ajax({
        url: './includes/scan-code-inc.php',
        data: { codeScaned: content },
        type: 'POST', 
        dataType: "json",
     })
     .done( function(data) {
        console.log("QR Leido, Ckj1");  
        console.log(data.response);  
        console.log(data.client_first+" "+data.client_last);
        console.log(data.post_price_new+" "+data.post_title); 
        console.log(data.post_buss_name); 
        $(".loader").css("display", "none");
        $(".response").text(data.response);
        $(".response").css("color", "green");
        $(".response").css("margin-top", "10px");
        $(".response").css("font-size", "17px");

        $(".client_name").text(data.client_first+" "+data.client_last);
        $(".post_title").text(data.post_title);
        $(".post_price_new").text("R$"+data.post_price_new);
        $(".post_buss_name").text(data.post_buss_name);

        $(".info-container").css("display", "block");
        $(".client_name").css("display", "block");
        $(".post_title").css("display", "block");
        $(".post_buss_name").css("display", "block");
        $(".post_price_new").css("display", "block");
        $(".info-container").css("background-color", "#fff");


        if(data.response == "Codigo usado"){
        $(".response").css("color", "red");
        $(".response").css("margin-top", "10px");
        $(".response").css("font-size", "20px");
        $(".info-container").css("background-color", "#f9eae7");
        $(".client_name").text(data.client_first+" "+data.client_last);
        $(".post_title").text(data.post_title);
        $(".post_price_new").text("R$"+data.post_price_new);
        $(".post_buss_name").text(data.post_buss_name);
        }

    })
    .fail( function(data) {
        console.log("QR Leido, Ckj1");  
        $(".loader").css("display", "none");
        $(".response").text("Codigo no encontrado");
        $(".response").css("color", "red");
        $(".response").css("margin-top", "10px");
        $(".response").css("font-size", "20px");
        $(".info-container").css("display", "none");
        $(".client_name").css("display", "none");
        $(".post_title").css("display", "none");
        $(".post_buss_name").css("display", "none");
        $(".post_price_new").css("display", "none");
    })

    
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            if(cameras[1]){
                scanner.start(cameras[1]); 
                    
            } else {
                 scanner.start(cameras[0]);
            }
          
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });


      function playBeep() {
          var sound = document.getElementById("audio");
          sound.play();
      }

// function codigoenviado(codigo){
//     $(".section-body").html("<span id='code-scanned' style='text-align:center;margin:auto; display:block;font-size: 16px;'>Tu codigo es: "+codigo+"</span>");
//     $("#code-scanned").css("color", "green");
//     $("#code-scanned").css("margin-top", "10px");
//     scanner.stop();

//     function success_message_load_delay(){
                    
//                     $("#code-scanned").css("opacity", "0");
                    
//                     setTimeout(success_redirect_load_delay, 800);
//                     function success_redirect_load_delay(){
                        
                        
//                         cargarContenido('scan-qr/result-scan.php');



                        
//                     }
//                 }
//                 setTimeout(success_message_load_delay, 600);
//     codigo = null;
// }
</script>