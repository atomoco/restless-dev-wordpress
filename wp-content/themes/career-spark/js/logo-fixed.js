$(document).ready( function() {

  $(window).scroll(function(){
    
    var top = $(window).scrollTop();
    
    if ( top < 5 ) {
      $('#logo-back1').attr('class','').css('-webkit-mask-position', '0 0');
      $('#logo-back2').addClass('red').css('-webkit-mask-position', '0 0');
    } else if ( top >= 5 && top < 160 ) {
      $('#logo-back1').attr('class','');
      $('#logo-back2').addClass('red').css('-webkit-mask-position', '0 -' + ( 60 + top ) + 'px');
    } else {
      $('#logo-back2').addClass('red').css('-webkit-mask-position', '0 -250px');
    }
        
  })

})