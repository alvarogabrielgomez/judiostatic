var header;
header = document.getElementById("header");
var ultimotop;
ultimotop = 0;




function esconder(){
var distancia_resultado;
distancia_resultado = window.pageYOffset || document.documentElement.scrollTop;
console.log(distancia_resultado);

if(distancia_resultado < 480)
{
 $('#header').css({'background-color':'black'});
header.style.backgroundColor = "#000";
}
else{
header.style.backgroundColor = "#fff";
}
}





 $(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});






$(window).load(function() {
   $('#precarga').fadeOut('slow');

})




window.onload = function() {
  //funciones a ejecutar

        // cargamos el icono en el div donde ira el contenido
        $("#main").html("<img src='img/loading.svg' class='loader' border='0' />");
        // cargamos la pagina en el div capa
        $("#main").load('inicio.html');



};






$(document).ready(function(){

$( "#flecha-portada" ).hover(
  function() {
  	var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    $( "#flecha-portada" ).addClass( "animated downOut" );
  }, function() {
  	$('#flecha-portada').one('animationEnd').removeClass( "animated downOut" );
  }
);

            });

  function cargarContenido(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $("#main").html("<img src='img/loading.svg' class='loader' border='0' />");
        // cargamos la pagina en el div capa
        $("#main").load(pagina);
    }



