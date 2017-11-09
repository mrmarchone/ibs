/*global $, document*/
$(document).ready(function () {
    'use strict';
    $('html').smoothScroll();
    $('input[type=password]').val('');
    $('input').focusin(function () {
        $(this).removeAttr('placeholder');
    });
});
