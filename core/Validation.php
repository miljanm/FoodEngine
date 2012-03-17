
<?
class Validation
{
	function par($errorMessages, $booleans)
	{
		$count = count($errorMessages);

		for($i = 0; $i < $count; $i++)
			if($booleans[$i])
				return $errorMessages[$i];
		
		return "";
	}
}
?>
