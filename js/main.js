$(document).ready(function(){

  $('#direct_url').focus();
  $('#website_url').focus();

  //===================
  // Delete cache
  $("#delCache").click(function(){
    delete_cache();
  });

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
  // Google Dork
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

  $("#select-all").change(function(){
    $(".sitemap-checkbox").each(function(){
      $(this).prop('checked', $('#select-all').is(':checked'));
    });
  });
});


//===================
// Functions and stuff
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
    $("#result").html("The field is empty (don't try to fool me again)");
  }
};

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
    $("#result").html("The field is empty (don't try to fool me again)");
  }
}

function delete_cache(){
  //Collect sitemaps checked
  var checkboxes = []
  $(".sitemap-checkbox").each(function(i){
    if($(this).is(":checked")){
      checkboxes[i] = $(this).val();
    }
  });

  $.ajax({
    type: "POST",
    url: "ajax/deleteCache.ajax.php",
    data: {sitemaps: checkboxes}
  }).done(function(msg){
    if($.trim(msg) == "0"){
      var alert = '<div class="row"><div class="span12"><div id="alert-cache" class="alert alert-success fade in"><a class="close" data-dismiss="alert">×</a>Cache has been correctly deleted</div></div></div>';
      $("#display-alert").html(alert);
    }else{
      var alert = '<div class="row"><div class="span12"><div id="alert-cache" class="alert alert-error fade in"><a class="close" data-dismiss="alert">×</a>An error occured :[</div></div></div>';
      $("#display-alert").html(alert);
    }
    $(".sitemap-checkbox").each(function(i){
      if($(this).is(":checked")){
        // Remove checkbox and label (parent) after deleting cache
        $(this).parent().remove();
      }
    });
  });
}