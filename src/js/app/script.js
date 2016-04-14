


$( ".my-plan" ).click(function(e) {
  e.preventDefault();
  $(".left-bar" ).toggleClass( "toggled" );
  $(".main-content").toggleClass( "toggled" );
  $(".my-plan").toggleClass( "toggled" );
  $(".container-movie").toggleClass( "toggled" );
});

