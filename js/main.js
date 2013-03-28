$(document).ready(function(){

  $('#direct_url').focus();
  $('#website_url').focus();

  //===================
  // Full Website
  $("#website_url").keyup(function(e){
    if(e.which == 13){
      ajax_full_website();
    }
  });

  $("#submitWebsite").click(function(){
    ajax_full_website();
  });

  function ajax_full_website(){
    if($("#website_url").val() != ""){
      $("#result").html('<div id="floatingBarsG"><div class="blockG" id="rotateG_01"></div><div class="blockG" id="rotateG_02"></div><div class="blockG" id="rotateG_03"></div><div class="blockG" id="rotateG_04"></div><div class="blockG" id="rotateG_05"></div><div class="blockG" id="rotateG_06"></div><div class="blockG" id="rotateG_07"></div><div class="blockG" id="rotateG_08"></div></div>  <div style="margin-left : 250px;">Generation of links in progress, it may takes a few minutes... </div>');
      $.ajax({
        type: "POST",
        url: "ajax/sitemap.ajax.php",
        data: {url : $("#website_url").val()}
      }).done(function(msg){
        if($.trim(msg) != "-1"){
          $("#result").html(msg);

          // Syntax highlighting
          $(".green").each(function(){
            $(this).prev('span').removeClass("icon-ok");
            $(this).prev('span').html('<img src="img/ajax-loader.gif" alt="Loader" />');

            var prev = $(this).prev('span');
            var divResult = $(this).next(".resultsql");

            console.log(divResult);
            $.ajax({
                type: "POST",
                url: "ajax/sqlmap.ajax.php",
                dataType: "json",
                data: {url : $(this).html() , options : $("#formsqlmap").serializeArray()},
                success: function(donnees){                  
                  if(donnees.returnCode < 0){
                    prev.html('Fail ');
                    prev.addClass('label label-important');
                  }
                  else{
                    prev.html('Success');
                    prev.addClass('label label-success');
                  }
                  divResult.html(data["message"]);
                }
            });
          });

        }else{
          $("#result").html("Bad result :[");
        }
      });
    }else{
      $("#result").html("The field is empty modafacka.");
    }
  };

  //===================
  // Direct Link
  $("#direct_url").keyup(function(e){
    if(e.which == 13){
      ajax_direct_link();
    }
  });

  $("#submitLink").click(function(){
    ajax_direct_link();
  });

  //===================
  //Google Dork
  // (un peu obscur)
  $("#submit").click(function(){
    $.ajax({
      type: "POST",
      url: "ajax/sqlmap.ajax.php",
      data: {url : $("#url").val()}
    }).done(function( msg ) {
      if($.trim(msg) != "-1"){
        $("#result").html(msg) ;
      }else   $("#result").html("bad result") ;
    });
  });
});

function ajax_direct_link(){
  if($("#direct_url").val() != ""){
    $("#result").html('<div id="floatingBarsG"><div class="blockG" id="rotateG_01"></div><div class="blockG" id="rotateG_02"></div><div class="blockG" id="rotateG_03"></div><div class="blockG" id="rotateG_04"></div><div class="blockG" id="rotateG_05"></div><div class="blockG" id="rotateG_06"></div><div class="blockG" id="rotateG_07"></div><div class="blockG" id="rotateG_08"></div></div>  <div style="margin-left : 350px;">Testing URL, it may takes a few minutes... </div>');

    $.ajax({
      type: "POST",
      url: "ajax/sqlmap.ajax.php",
      data: {url : "http://" + $("#direct_url").val(), options : $("#formsqlmap").serializeArray()}
    }).done(function(msg){
      if($.trim(msg) != "-1"){
        $("#result").html(msg);
      }else{
        $("#result").html("Bad result :[");
      }
    });
  }else{
    $("#result").html("The field is empty modafacka.");
  }
}