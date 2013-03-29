$(function(){

	var ajaxLoader = $("#ajax-loader"),
		sqlmapOptionDiv = $("#sqlmap-options"),
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
					$.each(data['siteMap'], function(k, v){
						// link seems to have GET parameters in
						if(v){
							spanLink ='<span><i class="icon-ok"></i> ' + k + ' </span><a href="' + k + '" class="sqlmap"><button class="btn btn-mini">sqlmap me !</button></a> <div class="ajax-loader" style="display: none;"></div><div class="sqlmap-result" style="display: none;"><br /><span class="label"></span><br /><br /><blockquote></blockquote></div>';
						}
						else{
							spanLink ='<span><i class="icon-remove"></i> ' + k + '</span>';
						}

						rowDiv = '<div class="row" />';
						$("#results").append(rowDiv);

						$(" > div.row:last", "#results").append(spanLink);
						$(" > div.row:last", "#results").append('<hr />');
					});

					$(document).on("click", "a.sqlmap", function(e){
						e.preventDefault();

						var link = $(this).attr("href"),
							linkAjaxLoader = $(this).next(".ajax-loader"),
							resultDiv = $(this).next().next(".sqlmap-result");

						linkAjaxLoader.show();

						$.ajax({
							type: "post",
							url: "index.php?ctl=home&act=submit&link=" + link,
							dataType: "json",
							data: $("#sqlmap-options").serialize(),
							success: function(data){
								$("> span", resultDiv).removeClass("label-success label-warning")
								if(data['returnCode'] == "0"){
									$("> span", resultDiv).addClass("label-success");
									$("> span", resultDiv).html("Success");
								}
								else{
									$("> span", resultDiv).addClass("label-success");
									$("> span", resultDiv).html("Failure");
								}

								$("> blockquote", resultDiv).html(data['returnValue']);

								if(data['returnCode'] == "0"){
									link = '<a href="' + data['outputFile'] + '"><button class="btn">Download link</button></a><br /><br />';
									$("> blockquote", resultDiv).append(link);
								}

								resultDiv.slideDown();
							},
							complete: function(data){
								linkAjaxLoader.hide();
								ajaxInProgress = false;
							}
						});
					});

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
});