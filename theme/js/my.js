
$(function() 
{
	var showDZoneVal = $("#showDZoneExp").html();
	$("#showDZoneExp").bind("click", function() {
		if(!$("#whatIsDZone").is(":visible"))
		{
			$(this).html("Hide information");
			$("#whatIsDZone").fadeIn(400);
		}
		else
		{
			$(this).html(showDZoneVal);
			$("#whatIsDZone").fadeOut(400);
		}
	});
	
	$("#showForm").bind("click", function() {
		if(!$("#regForm").is(":visible"))
			$("#regForm").fadeIn(400);
		else
			$("#regForm").fadeOut(400);
	});	
	
	$("#regForm").submit(function() {
		$("input[name=username]:last").removeClass("badInput");
		$("input[name=email]").removeClass("badInput");
		$("input[name=password]").removeClass("badInput");
		
		$.post("MainPage/Index/register", $(this).serialize(), function(data) {
			if(data.badField.length == 0)
				location.reload();
			
			$("#regAnswer").hide();
			var badField = "input[name=" + data.badField + "]:last";
			
			$("input").blur();
			
			$(badField).animate({"margin-left":"15px"}, 200);
			$(badField).animate({"margin-left":"0"}, 200);
			$(badField).addClass("badInput");
			
			$("#regAnswer").html(data.errorMessage);
			$("#regAnswer").fadeIn(400);
		}, "json")
	})
	
	$("#logForm").submit(function() {
		$.post("MainPage/Index/logIn", $(this).serialize(), function(data) {
			if(data.bool)
				alert("Bad logins");
			else
				location.reload();
		}, "json")
	})
})
