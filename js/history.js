$(document).ready(function(){
  $(function(){
    $('#history-tabs a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    })
  });

  // $('.accordion-body').collapse("hide");
  // $('.accordion-toggle').click(function(){
  //   $(this).collapse();
  // });
});

