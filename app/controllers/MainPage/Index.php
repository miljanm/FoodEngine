<?

class Index extends Controller
{
	private $foodNoPerPage = 3;
	
	function __construct()
	{
		if($_POST)
			$this->ajax = TRUE;
		
		parent::__construct();
	}
	
	public function mainPage()
	{
		$this->loadView("MainInput");
	}
	
	public function startSearching($more = 0)
	{
		$this->loadModel("Restaurants");
		
		if($more == 0)
		{
			$_SESSION['keyword'] = $_POST['searchString'];
			$_SESSION['start'] 	 = 0;
		}
		else 
		{
			$_SESSION['start'] += $this->foodNoPerPage;
		}
			
		$answer['restaurants'] = $this->Restaurants->
		                         searchForRestaurants($_SESSION['keyword'], 
		                         $_SESSION['start'], $this->foodNoPerPage);
		
		$this->loadView("Restaurants", $answer);
		
		if(!empty($answer['restaurants']))
			$this->loadView("MoreRestaurantsButton");

	}

}
?>
