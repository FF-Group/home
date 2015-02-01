jQuery(document).ready(function($){
    //$('.portfolio-wrapper').hide();
    
    $('.menu-item-26').click(function(e){
        e.preventDefault();
       $('.panel').hide();
        $('.portfolio-wrapper').show();
    });
    
    
    
    $('li.menu-item a').click(function(){
        if(!$('.portfolio-wrapper').is(':hidden')){
            if(!$(this).parent().hasClass('menu-item-26')){
                if($('.panel').is(':hidden')){
                    $('.panel').show();
                    $('.portfolio-wrapper').hide();
                }
                $('li.menu-item a').each(function(){
                    if($(this).hasClass('selected')){
                        $(this).removeClass('selected');
                    }
                });
                $('li.menu-item a:first').addClass('selected');
            }
        }
    });
});
