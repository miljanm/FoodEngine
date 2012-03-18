<?
if(empty($restaurants))
	echo "<div class='alert alert-error'>No restaurants found by your keyword, sorry, try again.</div>";
?>

<? foreach($restaurants as $restaurant):?>

<div class="youEat">
	You can eat <b class="foodName"><?=$restaurant['foodName'];?></b> 
    for <i>£<?=$restaurant['Price'];?></i>
	at 
	<b><?=$restaurant['restaurantName'];?></b>
</div>

<h4>Restaurant info:</h4><br />
<table class="table table-striped table-bordered table-condensed foodTable">
<tr>
	<td class="name">Restaurant name: </td>
	<td><b><?=$restaurant['restaurantName'];?></b></td>
</tr>	
<tr>
	<td>Address: </td>
	<td><b><?=$restaurant['Address'];?></b></td>
</tr>	
<tr>
	<td>Post code: </td>
	<td><b><?=$restaurant['Postcode'];?></b></td>
</tr>	
<tr>
	<td>Contact number: </td>
	<td><b><?=$restaurant['ContactNumber'];?></b></td>
</tr>	
<tr>
	<td>Contact e-mail: </td>
	<td><b><?=$restaurant['ContactEmail'];?></b></td>
</tr>	
<tr>
	<td>Website URL: </td>
	<td><b><a href="http://<?=$restaurant['WebsiteURL'];?>"><?=$restaurant['WebsiteURL'];?></a></b></td>
</tr>	
	
</table>


<hr style="opacity:0.3" />

<? endforeach; ?>



