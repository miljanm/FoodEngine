
<?

class Restaurants extends Model
{
	public function searchForRestaurants($string, $start, $pages)
	{
		$string = mysql_real_escape_string($string);
		
		$query = "
		SELECT *, f.Name as foodName, r.Name as restaurantName, 
		MATCH(f.Name, f.Category, r.Name) AGAINST ('{$string}' IN BOOLEAN MODE) 
		AS score FROM Food AS f
		INNER JOIN Restaurant AS r
		ON f.RestaurantID = r.RestaurantID
		WHERE 
		MATCH(f.Name, f.Category, r.Name) AGAINST ('{$string}' IN BOOLEAN MODE) 
		ORDER BY score DESC LIMIT {$start}, {$pages}";
		
		$string = $this->db->selectPlain($query);
					   
		return $string;
	}
}
?>

