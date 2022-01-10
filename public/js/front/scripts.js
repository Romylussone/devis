/*!
    * Start Bootstrap - Grayscale v6.0.3 (https://startbootstrap.com/theme/grayscale)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-grayscale/blob/master/LICENSE)
    */
    (function ($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 70,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").click(function () {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#mainNav",
        offset: 100,
    });

    // Collapse Navbar and show or hide 360°btn
    var navbarCollapse = function () 
    {
        if ($("#mainNav").offset().top > 100) 
        {
            $("#mainNav").addClass("navbar-shrink");

            // $("#btnVisite360Nav").css("opacity","1");
        } 
        else 
        {
            $("#mainNav").removeClass("navbar-shrink");
            // $("#btnVisite360Nav").css("opacity","0");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();

    
    // Collapse Tour360Block
    var infoblockCollapse = function () 
    {
        if ($("#Tour360").offset().top > ($("#MainSlider").height() - $("#Tour360").height())) 
        {
            $("#Tour360").css("opacity","0");
            $("#btnVisite360Nav").css("opacity","1");
        } 
        else 
        {
            $("#Tour360").css("opacity","1");
            $("#btnVisite360Nav").css("opacity","0");
        }
    };
    // Collapse Tour360Block
    infoblockCollapse();

    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
    $(window).scroll(infoblockCollapse);


    //Anim Letter
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml2');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    var animation = anime.timeline({loop:true})
    .add({
        targets: '.ml2 .letter',
        scale: [4,1],
        opacity: [0,1],
        translateZ: 0,
        easing: "easeOutExpo",
        duration: 950,
        delay: (el, i) => 70*i
    })
    .add({
        targets: '.ml2',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 5000,
        complete: function(anim) 
        {
        //   alert("anim complete");
        }
    })

    //All image Loader 
    // Je vérifie que toute les images ont bien été chargé
    // Puis on lance enlève le loader
    var allImage = $("img");

    var intervalID = setInterval(function(interval)
    {
        var imagesLoad = true;
        allImage.each(function(i,element)
        {
            if(element.complete == false)
            {
                imagesLoad = false;
            } 
        });

        if(imagesLoad)
        {
            $("#image-loader-layer").css("display","none");
            clearInterval(intervalID);
        }
    },1000);


})(jQuery); // End of use strict
