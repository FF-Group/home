jQuery(document).ready(function($){
    $('.portfolio-wrapper').hide();
    
    $('.menu-item-26').click(function(e){
        e.preventDefault();
       $('#slider').hide();
        $('.portfolio-wrapper').show();
    });
    
    $('.return-link').click(function(){
        if($('#slider').is(':hidden')){
            $('#slider').show();
            $('.portfolio-wrapper').hide();
        }
    });
});
