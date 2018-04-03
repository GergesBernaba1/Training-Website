$(function(){

	"use strict" ;
	var scrollToTop  = $(".scrollToTop i");


	//scrollTop Section
    $(window).scroll(function () {
       
        if ($(this).scrollTop() >=  200) {   
            scrollToTop.fadeIn(500);
        } else {         
            scrollToTop.fadeOut(500);
        }
        
    });
    
    scrollToTop.click(function () {
       
        $("html, body").animate({
            scrollTop: 0
        },800);
    });

    $(window).scroll(function(){
        var fromTop = ($(this).scrollTop());

        if (fromTop >= 150) {
            $(".slick-dots").css("display","none");
        } else {
            $(".slick-dots").css("display","block");
        }
    });

    // start owl-carousel opinions

      $(document).ready(function() {
     
      var owl = $("#owl-demo");
     
      owl.owlCarousel({
          autoPlay:3000,
          items : 1, //1 item above 1000px browser width
          itemsDesktop : [1000,1], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,1], // betweem 900px and 601px
          itemsTablet: [600,1], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });
     
     
    });


    // start owl-carousel trainee

      $(document).ready(function() {
     
      var owl = $("#owl-demo1");
     
      owl.owlCarousel({
          autoPlay:2000,
          items : 6, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });
     
     
    });


      // live chat Section

      $(".chat a").click(function(event){
        event.preventDefault();
        $(this).fadeOut(1000);
        $(".live iframe").fadeIn(1000);
        $("#close").css({"z-index":"99999","display":"block"});
      })

      $("#close").click(function(event){
        event.preventDefault();
        $(".live iframe").fadeOut(1000);
        $(".chat a").fadeIn(1000);
        $("#close").css({"z-index":"1","display":"none"});
      }) ;


      // messanger item
      $(".fb-message img").mouseover(function(){
        $(".fb-message p").css({"display":"block","transition":"all .3s ease-in-out"});
      })

      $(".fb-message img").mouseleave(function(){
        $(".fb-message p").css({"display":"none","transition":"all .3s ease-in-out"});
      })


});    