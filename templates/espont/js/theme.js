/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    // $('article[data-permalink]').socialButtons(config);
    
    //Растягивание блоков на главной на всю высоту
    blockHeightFix();
    jQuery(window).resize(function(){
        blockHeightFix();
    });
    
    //Анимация блоков на главной
    jQuery('.js-home-block').hover(function(){
        console.log(jQuery(this).index());
    });
});

function blockHeightFix(){
    var windowHeight = jQuery(window).height();
    jQuery('.uk-menu-advance-block').height(windowHeight);
}