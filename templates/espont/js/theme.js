/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    // $('article[data-permalink]').socialButtons(config);
    
    //Растягивание блоков на главной на всю высоту и их анимация
    blockHeightFix();
    blocksAnimate()
    jQuery(window).resize(function(){
        blockHeightFix();
        blocksAnimate()
    });
    
    
    
});

function blockHeightFix(){
    if (jQuery(window).width() > 959){
        var windowHeight = jQuery(window).height();
        jQuery('.uk-menu-advance-block').height(windowHeight);
    }
}
function blocksAnimate(){
    if (jQuery(window).width() > 959){
        jQuery('.js-home-block').hover(function(){
            jQuery('.js-home-block').removeClass('uk-hovered');
            jQuery('.js-home-block').removeClass('uk-shift-left');
            jQuery('.js-home-block').removeClass('uk-shift-right');
            
            var blocksCount = jQuery('.js-home-block').length;
            var currentIndex = jQuery(this).index();

            jQuery(this).addClass('uk-hovered');
            
            if((currentIndex == 0) || (currentIndex == (blocksCount-1))){
                if(currentIndex == 0){
                    jQuery('.js-home-block').addClass('uk-shift-large-right');
                    jQuery(this).removeClass('uk-shift-large-right');
                    jQuery(this).addClass('uk-shift-right');
                } else if(currentIndex == (blocksCount-1)){
                    jQuery('.js-home-block').addClass('uk-shift-large-left');
                    jQuery(this).removeClass('uk-shift-large-left');
                    jQuery(this).addClass('uk-shift-left');
                }
                
            } else{
                for(var i = 0; i < currentIndex; i++){
                    jQuery('.js-home-block').eq(i).addClass('uk-shift-left');
                }
                for(var i = currentIndex + 1; i < blocksCount; i++){
                    jQuery('.js-home-block').eq(i).addClass('uk-shift-right');
                }
            }
            
        });
        jQuery('.js-home-block').mouseleave(function(){
            jQuery('.js-home-block').removeClass('uk-hovered');
            jQuery('.js-home-block').removeClass('uk-shift-left');
            jQuery('.js-home-block').removeClass('uk-shift-right');
            jQuery('.js-home-block').removeClass('uk-shift-large-left');
            jQuery('.js-home-block').removeClass('uk-shift-large-right');
        });
    }
}