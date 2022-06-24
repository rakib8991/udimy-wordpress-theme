(function($){

    $(document).ready(function(){

        // moblie menu toggle
        $('.mobile-menu .mobile').on('click',function(){
            $('nav.site-nav').toggle('slow');
        });

        $breakpoint = 768;

        // show menu 
        $(window).resize(function(){
            ektaFunction();
            if($(document).width() >= $breakpoint){
                $('nav.site-nav').show();
            }else{
                $('nav.site-nav').hide();
            }
        });

        ektaFunction();
        // about boxes image and content height
        function ektaFunction(){
            var boxImage = $('.box-image');
            if($(boxImage).length > 0){
                var imageHeight = boxImage[0].height;
                var boxContent = $('.box-content');
                
                $(boxContent).each(function(){
                    $(this).css('height',imageHeight +"px");
                });
            }
        }
    });

    // Fluidbox jquery pluign 

    $('.gallery a').each(function(){
        $(this).attr({'data-fluidbox':''});
    });

    if($('[data-fluidbox]').length > 0 ){
        $('[data-fluidbox]').fluidbox();
    }
    /// google maps height 
    var breakpoint = 768;
    $(window).resize(function(){
        if($('.google-maps').length > 0 ){
            if( $(document).width() > breakpoint){
                var heightMaps = $( '.reservation-info' ).height();
                googleMpapsHeight(heightMaps);
            }else{
                googleMpapsHeight(300);
            }
        }
        
    });
    var heightMaps = $( '.reservation-info' ).height();
    googleMpapsHeight(heightMaps);
    
    // google maps height function
    function googleMpapsHeight(value){
        $('.google-maps').css('height',value+'px');
    }
    
    
})(jQuery);