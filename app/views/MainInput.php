

<form action="" method="POST" onsubmit="return false" id="searchForm">
	
	<input type="text" name="searchString" class="mainInput" 
	placeholder="Enter the name of food you want to eat or restaurant name">
	
	<input type="submit" value="Search" class="btn btn-inverse mainButton">
	
</form>

<div class="answers">
</div>

<script>
$(function() {
	$("#searchForm").submit(function() {
		$.post("<?=URL;?>MainPage/Index/startSearching", $(this).serialize(), function(data)
		{
			$('.answers').hide().html(data).fadeIn(400);
		})
	})
})	
</script>