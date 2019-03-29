jQuery(document).ready(function($){
  if(document.getElementById("slider-01")){

    var $myCarousel = $('.carousel');

    //starts the Carousel (bootstrap)
    $myCarousel.carousel({
      interval: 5000
    });

    $myCarousel.on('slide.bs.carousel', function(e){
      var $animatingElements = $(e.relatedTarget).find("[data-animation ^= 'animated']");

      doAnimation($animatingElements);
    });

  var $firstAnimatedElement = $myCarousel.find('.carousel-item:first').find("[data-animation ^= 'animated']");
  doAnimation($firstAnimatedElement);
  function doAnimation(elems){

    //designe la fin des animations
    var animaEndEvenement = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    elems.each(function(){
      var $this = $(this);
      $animationType = $this.data('animation');
      $this.addClass($animationType).one(animaEndEvenement, function(){
        $this.removeClass($animationType);
      });
    }); //fin du each
  }// fin de la fonction doAnimation

  } //fin du if(document.getElementById("slider-01"))
});//fin du ready
