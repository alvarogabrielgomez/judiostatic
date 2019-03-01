<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc.php';
$first = mysqli_real_escape_string($conn, $_SESSION['client_first']);
$last = mysqli_real_escape_string($conn, $_SESSION['client_last']);
$to_email = mysqli_real_escape_string($conn, $_SESSION['client_email']);

$transqr = mysqli_real_escape_string($conn, $_SESSION['actual_transaction']);
$sql = "
SELECT * FROM transactions WHERE transaction_qr = $transqr AND post_id = $post_url_id

";
    $results=mysqli_query($conn, $sql);
    $resultsCheck=mysqli_num_rows($results);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    if($resultsCheck < 1){
        echo 'ERROR SQL';
        echo $transqr;
        echo $post_url_id;
        exit();
    }else{

    }
?>
<div  id="top"  class="animated fadeIn result">
        <div class="deal-info2" style="margin-top:0px!important;">
        <p> <i style="font-size: 1.5em;color: #7fbf4e;margin-right: 10px;" class="fas fa-check-circle" ></i> Oi, <?php echo $_SESSION['client_first']; ?>!.</p> 
        <p>Aqui está o seu código:</p>
        <p class="codigo-final">  <?php echo $transqr; ?>
        </p>

        <canvas id="qr" style="margin: auto;display: block;"></canvas>

        <!-- <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Codigo QR" /> -->
              
              
       
    
        <p>Pronto, seu código será enviado por <strong>Email</strong> também, mostre este código ao fazer sua compra em <strong><?php echo $post_buss_name; ?></strong> </p>
    </div>  
        <div>

        <div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul> 
                    <li><i style="font-size: 1.35em;color: #A6A4A4;" class="far fa-clock" ></i></li>
                    <li><?php echo $row['updated_at']; ?></li>
                </ul>
            </nav>
    </div>
</div>
        <div id="dos-botones">
            <div style="flex:50%;margin-right: 18px;"><a class="cerrar button blue modal-continue" >Pronto!</a></div>
            <!-- <div style="flex:50%;"><a class="button blue modal-continue" href="profile.php" >Veja meus cupons</a></div> -->
        </div>
        </div>
</div>


<script src="./js/qrious.min.js"></script>

<script>
var qr = new QRious({
    element: document.getElementById('qr'),
    value: '<?php echo $transqr; ?>',
    background: '#fbfbf2', // background color
    foreground: 'black', // foreground color
    backgroundAlpha: 1,
    foregroundAlpha: 1,
    level: 'L', // Error correction level of the QR code (L, M, Q, H)
    mime: 'image/png', // MIME type used to render the image for the QR code
    size: 150, // Size of the QR code in pixels.
    padding: null // padding in pixels
    
})




var cerrar = document.getElementsByClassName("cerrar")[0];
cerrar.onclick = function() {
     modal.style.display = "none";
     location.reload();
    }


// var canvas = document.getElementById("qr");
// var qruri = canvas.toDataURL("image/png");
// // document.write(qruri);
// canvas.toBlob(function(blob) {
//     var newImg = document.createElement("img"),
//     url = URL.createObjectURL(blob);    
//     window.newImg.src = url;
    
// });


</script>
<?php


// require 'email-mailer.php';
// require 'send-email-inc.php';
    unset($transqr);
    
?>

    