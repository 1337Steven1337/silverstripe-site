$(document).ready(function($) {


  /* toggle nav */
  $("#menu-icon").on("click", function(){
    $("#navitems").slideToggle();
    if(!$('body').hasClass('stop-scrolling')){
      $('body').addClass('stop-scrolling');
      $('#overlaydiv').addClass('overlay');
      $('body').bind('touchmove', function(e){e.preventDefault()})
    }else{
      $('body').removeClass('stop-scrolling')
      $('#overlaydiv').removeClass('overlay');
      $('body').unbind('touchmove');
    }
  });


  $("#toTopHover").click(function(event){
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });
});