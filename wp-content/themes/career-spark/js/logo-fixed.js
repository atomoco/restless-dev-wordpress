$(document).ready( function() {

  var redTop = $('.container-red .top');
  var redTopOff = redTop.offset().top;
  var redBottom = $('.container-red .bottom');
  var redBottomOff = redBottom.offset().top;
  var footerTop = $('#colophon');
  var footerTopOff = footerTop.offset().top;

  $(window).scroll(function(){
    
    var top = $(window).scrollTop();
    
    // header - within
    if ( top < 5 ) {
      $('#logo-back1').attr('class','').css({'z-index' : 1, '-webkit-mask-position': '0 0'});
      $('#logo-back2').removeClass('red').css({'z-index' : 0, '-webkit-mask-position': '0 0'});
    // header - bottom
    } else if ( top >= 5 && top < 160 ) {
      $('#logo-back1').attr('class','').css({'z-index' : 0});
      $('#logo-back2').addClass('red').css({'z-index' : 1, '-webkit-mask-position': '0 -' + ( 60 + top ) + 'px'});
    // red section - top
    } else if ( redTop.length > 0 && top >= (redTopOff - 160) && top < redTopOff ) {
      $('#logo-back1').addClass('yellow').css({'z-index' : 1, '-webkit-mask-position': '0 -' + ( 255 + (top - redTopOff) ) + 'px'});
      $('#logo-back2').css({'z-index' : 0, '-webkit-mask-position': '0 -250px'});
    // red section - within
    } else if ( redTop.length > 0 && top > redTopOff && top < redBottomOff - 160 ) {
      $('#logo-back1').addClass('yellow').css({'z-index' : 1, '-webkit-mask-position': '0 -250px'});
      $('#logo-back2').css({'z-index' : 0, '-webkit-mask-position': '0 0'});
    // red section - bottom
    } else if ( redTop.length > 0 && top >= (redBottomOff - 160) && top < redBottomOff ) {
      $('#logo-back1').css({'z-index' : 0, '-webkit-mask-position': '0 -250px'});
      $('#logo-back2').addClass('red').css({'z-index' : 1, '-webkit-mask-position': '0 -' + ( 175 + (top - redBottomOff) ) + 'px'});
    // footer - top
    } else if ( top >= (footerTopOff - 160) && top < footerTopOff ) {
      $('#logo-back1').addClass('yellow').css({'z-index' : 1, '-webkit-mask-position': '0 -' + ( 252 + (top - footerTopOff) ) + 'px'});
      $('#logo-back2').css({'z-index' : 0, '-webkit-mask-position': '0 -250px'});
    // red section - within
    } else if ( top > footerTopOff && top < 999999999 ) {
      $('#logo-back1').addClass('yellow').css({'z-index' : 1, '-webkit-mask-position': '0 -250px'});
      $('#logo-back2').css({'z-index' : 0, '-webkit-mask-position': '0 0'});
    // default
    } else {
      $('#logo-back1').attr('class','').css({'z-index' : 0});
      $('#logo-back2').addClass('red').css({'z-index' : 1, '-webkit-mask-position': '0 -250px'});
    }
        
  })

})