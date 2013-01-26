
$(document).ready(function(){
    $("#submit").click(function(){  

       $.ajax({
           type: "POST",
           url: "ajax/sqlmap.ajax.php",
           data: {url : $("#url").val()}
       }).done(function( msg ) {
           if($.trim(msg) != "-1"){
               $("#result").html(msg) ; 
           }
           else   $("#result").html("bad result") ;   
       }); 
   }); 
   
   // Entier Website
   
   $("#submitWebsite").click(function(){  
      
      $("#result").html('<div id="floatingBarsG"><div class="blockG" id="rotateG_01"></div><div class="blockG" id="rotateG_02"></div><div class="blockG" id="rotateG_03"></div><div class="blockG" id="rotateG_04"></div><div class="blockG" id="rotateG_05"></div><div class="blockG" id="rotateG_06"></div><div class="blockG" id="rotateG_07"></div><div class="blockG" id="rotateG_08"></div></div>  <div style="margin-left : 250px;">Generation of links in progress, it may takes few minutes... </div>') ; 
     
       $.ajax({
           type: "POST",
           url: "ajax/sitemap.ajax.php",
           data: {url : $("#url").val() }
       }).done(function( msg ) {
           if($.trim(msg) != "-1"){
               $("#result").html(msg) ; 
               $(".green").each(function(){
                    $(this).prev('span').removeClass("icon-ok") ; 
                    $(this).prev('span').html('<img src="img/ajax-loader.gif" alt="Loader" />') ; 
                   
                    var prev = $(this).prev('span') ;
                    var divResult = $(this).next(".resultsql") ; 
                    $.ajax({
                        type: "POST",
                        url: "ajax/sqlmap.ajax.php",
                        data: {url : $("#url").val() , options : $("#formsqlmap").serialize()}
                    }).done(function( msg ) {
                        
                        if(msg.search("[CRITICAL] no parameter(s) found for testing") == -1){
                            prev.html('Fail ') ; 
                            prev.addClass('label label-important') ; 
                        }
                        else{
                            prev.html('Success') ; 
                            prev.addClass('label label-success') ; 
                        }
                        
                        divResult.html(msg) ; 
                    }); 
               });
           }
           else   $("#result").html("bad result") ;   
       }); 
   }); 
   
   
}); 