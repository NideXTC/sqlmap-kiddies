$(document).ready(function(){
  $('.accordion-body').collapse("hide");
  $('.accordion-body').click(function(){
    $(this).collapse();
  });
});