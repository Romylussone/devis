$(document).ready(function() {
    $(".sub-menu > li ").each(function(){
        
        var l = $(this).children("a").attr('blink');
        $(this).children("a").attr('href',l);
    });

});