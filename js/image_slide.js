$(document).ready(function() {    
  
  
  slideShow(4000);

});

function slideShow(speed) {

  
  $('ul.slideshow').append('<li id="slideshow-caption" class="caption"><div class="slideshow-caption-container"><p></p></div></li>');

  
  $('ul.slideshow li').css({opacity: 0.0});
  
  
  $('ul.slideshow li:first').css({opacity: 1.0}).addClass('show');
  
  
  $('#slideshow-caption p').html($('ul.slideshow li.show').find('img').attr('alt'));
    

  $('#slideshow-caption').css({opacity: 0.6, bottom:0});
  
    
  var timer = setInterval('gallery()',speed);
  
  
  $('ul.slideshow').hover(
    function () {
      clearInterval(timer); 
    },  
    function () {
      timer = setInterval('gallery()',speed);     
    }
  );  
}

function gallery() {

  var current = ($('ul.slideshow li.show')?  $('ul.slideshow li.show') : $('#ul.slideshow li:first'));

  
  if(current.queue('fx').length == 0) {

    
    var next = ((current.next().length) ? ((current.next().attr('id') == 'slideshow-caption')? $('ul.slideshow li:first') :current.next()) : $('ul.slideshow li:first'));
      
    
    var desc = next.find('img').attr('alt');  
  
    
    next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
    
    
    $('#slideshow-caption').slideToggle(300, function () { 
      $('#slideshow-caption p').html(desc); 
      $('#slideshow-caption').slideToggle(500); 
    });   
  
    
    current.animate({opacity: 0.0}, 1000).removeClass('show');

  }
}