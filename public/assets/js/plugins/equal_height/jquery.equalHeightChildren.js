/*!
 * jQuery Equal Height Children
 *
 * Copyright (c) 2014 Md. Afzal Hossain
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://docs.jquery.com/License
 *
 * @version 1.1.0
 */
(function ($) {

    $.fn.equalHeightChildren = function () {
        // find first child, reset it's height and start recursive call
        $(this).children().css("height", "");
        $(this).children(":first").equalSibling();
    };

    $.fn.equalSibling = function () {
        // exit this function if no more sibling
        if (!$(this).next().position()) return false;

        // find max height for this row

        $current_sibling = $(this);
        var $max_height = $current_sibling.innerHeight();

        // while on the same row keep updating max_height
        while($current_sibling.next().position() && $current_sibling.next().position().top == $current_sibling.position().top){
            $current_sibling = $current_sibling.next();
            $max_height = Math.max($max_height,$current_sibling.innerHeight());
        }

        // reset current sibling
        $current_sibling = $(this);
        $current_sibling.innerHeight($max_height);

        // set all of them to max_height
        while($current_sibling.next().position() && $current_sibling.next().position().top == $current_sibling.position().top){
            $current_sibling = $current_sibling.next();
            $current_sibling.innerHeight($max_height);
        }

        // move onto the next row if available
        if($current_sibling.next().position()){
            $current_sibling.next().equalSibling();
        }

    };

    // auto-initialize plugin


})(jQuery);

jQuery(document).ready(function ($) {
    // find all element with data-equal-children-height attribute make their children equal height (max height of each row)
    $('[data-equal-height-children]').each(function () {
        $(this).equalHeightChildren();
    });

    // if window is re-sized then call again
    $(window).resize(function(){
        jQuery('[data-equal-height-children]').each(function () {
            $(this).equalHeightChildren();
        });
    });
    $(window).ajaxComplete(function(){
        jQuery('[data-equal-height-children]').each(function () {
            $(this).equalHeightChildren();
        });
    });
});
