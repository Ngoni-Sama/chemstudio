
$(function(){
  $('#element li').click(function(){
    var self = $(this).hasClass('active');
    $('.active .details').fadeOut();
    $('.active').removeClass('active');
    if (!self) {
      $(this).find('.details').fadeIn('.details');
      $(this).addClass('active');
    }
  });
})