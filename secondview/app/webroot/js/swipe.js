$(document).ready(function() {

  $("#myCarousel").swiperight(function() {
    $("#myCarousel").carousel('prev');
    $(".item").click(function () {return false;});
    setTimeout(function() {
       $(".item").unbind("click");   
    }, 2500);
  });

  $("#myCarousel").swipeleft(function() {
    $("#myCarousel").carousel('next');
    $(".item").click(function () {return false;});
    setTimeout(function() {
       $(".item").unbind("click");   
    }, 2500);
  });

  $("#myCarousel").carousel({
    interval: 3000,
    pause: "hover"
  });


});


//A hack to prevent default drag event
window.ondragstart = function() { return false; }
