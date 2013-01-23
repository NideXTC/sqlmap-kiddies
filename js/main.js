$("#submit").click(function(){
  window.setInterval(function(){ terminal($("#url").val()) }, 1000)
  $.ajax({
    type: "POST",
    url: "sqlmap.ajax.php",
    data: {url : $("#url").val()}
   }).done(function( msg ) {
      if($.trim(msg) != "-1"){ $("#result").html(msg) ; }
      else   $("#result").html("bad result") ;   
  }); 
});


function terminal(){

}