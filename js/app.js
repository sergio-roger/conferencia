$(document).ready(function() {
    var op = 0;

    $(window).resize(function(){
        var ancho = $(window).width();
        // console.log(ancho);

        if(ancho >= 768){
            $('.menu').css({"transform":'translateX(0%)'});
            op = 1;
        }
    });

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

    $('.id-menu').click(function(){
        // console.log('ancla presionado')
        Deslizmiento();        
    });

    function Deslizar_menu(){
        $('#icono-menu').click(function(){
            // transform: translateX(-100%);
            Deslizmiento();
        });
    }
    function Deslizmiento(){
        if(op == 0){
            $('.menu').css({"transform":'translateX(0%)'});
            op = 1;
        }
        else{
            $('.menu').css({"transform":'translateX(-100%)'});
            op = 0;
        }
        // console.log('Var op = ', op);
    }

    Deslizar_menu();
    Scroll();
});