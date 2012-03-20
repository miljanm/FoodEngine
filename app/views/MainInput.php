

<form action="" method="POST" onsubmit="return false" id="searchForm">
	
	<input type="text" name="searchString" class="mainInput" 
	placeholder="Enter the name of food you want to eat or restaurant name">
	
	<input type="submit" value="Search" class="btn submitSearch btn-inverse mainButton">
	
</form>

<div class="answers">
</div>

<script>
$(function() {
	$("#searchForm").submit(function() {
    post();
	})
	
	$('.mainInput').keyup(function() {
	  post();
	})
	
	function post()
	{
	  $('.answers').hide().html("Loading...").fadeIn(0);
	  $.post("<?=URL;?>MainPage/Index/startSearching", {searchString : $('.mainInput').val()}, function(data)
	  {
		  $('.answers').hide().html(data).fadeIn(0);
	  })
  }
})	
</script>
