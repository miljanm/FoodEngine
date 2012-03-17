
<div class="btn btn-default moreRestaurants">More restaurants</div>

<script>
$(function() {
	$(".moreRestaurants").click(function() {
		$.post("<?=URL;?>MainPage/Index/startSearching/1", {id:1}, function(data)
		{
			$('.moreRestaurants').attr("disable", "disabled").fadeOut(400);
			$('.answers').append(data);
		})
	})
})	
</script>