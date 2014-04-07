$(document).ready(function() {

  $("#myCarousel").swiperight(function() {
    $("#myCarousel").carousel('prev');
  });

  $("#myCarousel").swipeleft(function() {
    $("#myCarousel").carousel('next');
  });

  $("#myCarousel").carousel({
    interval: 3000,
    pause: "hover"
  });


});



//A hack to prevent default drag event
window.ondragstart = function() { return false; }
