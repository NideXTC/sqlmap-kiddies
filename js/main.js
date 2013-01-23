/*
$(document).ready(function(){
    $("#submit").click(function(){  

       alert("totootot");
       $.ajax({
           type: "POST",
           url: "ajax/sqlmap.ajax.php",
           data: {url : $("#url").val()}
       }).done(function( msg ) {
           if($.trim(msg) != "-1"){
               $("#result").html(msg) ; 
               window.setInterval(function(){ terminal($("#url").val()) }, 1000)
           }
           else   $("#result").html("bad result") ;   
       }); 
   });  
});*/

function terminal(){
    $.ajax({
        type: "POST",
        url: "ajax/lireFichier.ajax.php"
    }).done(function( msg ){
        $("#result").html(msg) ;
    }); 
}