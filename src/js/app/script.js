$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});

$('.owl-carousel').owlCarousel({
    loop:true,

    nav:true,
    responsive:{
        0:{
            items:1,
            margin:-250
        },
        370:{
            items:2,
            margin:-270
        },
        470:{
            items:2,
            margin:-260
        },
        768:{
            items:2,
            margin:-260
        },
        1024:{
            items:4
        },
        1440:{
            items:6
        }

    }
});

var nav = document.querySelector('.menu')
var items = document.querySelectorAll('.menu-li')
var menu_ul = document.querySelectorAll('.menu-ul')

function show() {
  // Animate the popover
  dynamics.animate(nav, {
    opacity: 1,
    scale: 1
  }, {
    type: dynamics.spring,
    frequency: 200,
    friction: 270,
    duration: 300
  })

  // Animate each line individually
  for(var i=0; i<items.length; i++) {
    var item = items[i]
    // Define initial properties
    dynamics.css(item, {
      opacity: 0,
      translateY: -5
    })

    // Animate to final properties
    dynamics.animate(item, {
      opacity: 1,
      translateY: 5
    }, {
      type: dynamics.spring,
      frequency: 300,
      friction: 435,
      duration: 1000,
      delay: 100 + i * 40
    })
  }
}

function hide() {
  // Animate the popover
  dynamics.animate(nav, {
    opacity: 1,
    scale: 1
  }, {
    type: dynamics.easeInOut,
    duration: 300,
    friction: 100
  })

  for(var i=0; i<items.length; i++) {
    var item = items[i]
    // Define initial properties
    dynamics.css(item, {
      opacity: 1,
      translateY: 20
    })

    // Animate to final properties
    dynamics.animate(item, {
      opacity: 0,
      translateY: 0
    }, {
      type: dynamics.spring,
      frequency: 300,
      friction: 435,
      duration: 1000,
      delay: 100 + i * 40
    })
  }
}
$( ".menu" ).on( "click", function() {
  $(".menu" ).addClass( "toggled" );
  $(".menu-ul").addClass( "toggled" );
  show()
});
$( ".menu").on( "clickout", function() {
	console.log('YEAH');
  $(".menu").removeClass( "toggled" );
  $(".menu-ul").removeClass( "toggled" );
  hide()
});
