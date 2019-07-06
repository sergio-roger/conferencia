$(document).ready(function() {
    
    Scroll();

    function Scroll(){
        $('a[href^="#"]').click(function() {
            var destino = $(this.hash);
            if (destino.length == 0) {
              destino = $('a[name="' + this.hash.substr(1) + '"]');
            }
            if (destino.length == 0) {
              destino = $('html');
            }
            $('html, body').animate({ scrollTop: destino.offset().top }, 500);
            return false;
          });
    }

    $('#icono-menu').click(function(){
        $('.menu').toggleClass('efecto-menu');
    });

    $('.item-menu').click(function(){
        console.log('Ancla presionados');
        $('.menu').toggleClass('efecto-menu');
    }); 
});