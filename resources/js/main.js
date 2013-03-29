$(function(){

	ajaxLoader = $("#ajax-loader");
	sqlmapOptionDiv = $("#sqlmap-options");
	ajaxInProgress = false;

	$("form").on("submit", function(e){
		e.preventDefault();

		if(!ajaxInProgress){
			ajaxInProgress = true;
			ajaxLoader.show();
			$("#results").slideUp();
			sqlmapOptionDiv.slideUp();

			var resultsDiv = $("#results > div");
			var action = $(this).attr("action");

			$.ajax({
				type: "post",
				url: action,
				dataType: "json",
				data: $(this).serialize(),
				success: function(data){
					$("> span", resultsDiv).removeClass("label-success label-warning")
					if(data['returnCode'] == "0"){
						$("> span", resultsDiv).addClass("label-success");
						$("> span", resultsDiv).html("Success");
					}
					else{
						$("> span", resultsDiv).addClass("label-success");
						$("> span", resultsDiv).html("Failure");
					}

					$("> blockquote", resultsDiv).html(data['returnValue']);

					if(data['returnCode'] == "0"){
						link = '<a href="' + data['outputFile'] + '"><button class="btn">Download link</button></a><br /><br />';
						$("> blockquote", resultsDiv).append(link);
					}
					$("#results").slideDown();
				},
				complete: function(data){
					ajaxLoader.hide();
					ajaxInProgress = false;
				}
			});
		}
		else{
			alert('Work in progress... Please wait...');
		}

	});

	$("#link").on("click", function(e){
		sqlmapOptionDiv.slideDown();
	});

});