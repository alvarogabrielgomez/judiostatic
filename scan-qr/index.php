<div id="preview-container">
<video id="preview"></video>
<span style='' class="response"></span>
<br>
<span style='' class="client_name"></span>
<br>
<span style='' class="post_title"></span>
</div>








    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ 
          video: document.getElementById('preview'),
            mirror:false,
            backgroundScan: false,
          
        });

      scanner.addListener('scan', function (content) {
        console.log(content);

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
        $(".response").text(data.response);
        $(".response").css("color", "green");
        $(".response").css("margin-top", "10px");
        $(".client_name").text(data.client_first+" "+data.client_last);
        $(".post_title").text(data.post_title);

    });


        // success: function(data) {
        //     console.log("QR Leido, Ckj1");  
        //     // codigoenviado(data.code);
        //     console.log(data.content);
        // }
        
    
    
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



function codigoenviado(codigo){
    $(".section-body").html("<span id='code-scanned' style='text-align:center;margin:auto; display:block;font-size: 16px;'>Tu codigo es: "+codigo+"</span>");
    $("#code-scanned").css("color", "green");
    $("#code-scanned").css("margin-top", "10px");
    scanner.stop();

    function success_message_load_delay(){
                    
                    $("#code-scanned").css("opacity", "0");
                    
                    setTimeout(success_redirect_load_delay, 800);
                    function success_redirect_load_delay(){
                        
                        
                        cargarContenido('scan-qr/result-scan.php');



                        
                    }
                }
                setTimeout(success_message_load_delay, 600);
    codigo = null;
}
</script>