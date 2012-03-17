<?

//Bootstrap uses url and invokes a Controller, method's call, parametres and other cool stuff

class Bootstrap 
{
	function checkFolders($folderName)
	{
		foreach(Auth::$FOLDERS_TO_ACCESS as $key=>$val)
			if($key == $folderName)
				foreach($val as $id=>$nameOfSession)
					if(!isset($_SESSION["{$nameOfSession}"]))
						header("Location:" . URL);
	}
	
	function checkControllers($controllerName)
	{
		foreach(Auth::$CONTROLLERS_TO_ACCESS as $key=>$val)
			if($key == $controllerName)
				foreach($val as $id=>$nameOfSession)
					if(!isset($_SESSION["{$nameOfSession}"]))
						header("Location:" . URL);
	}	
	
	function checkMethods($methodName)
	{
		foreach(Auth::$METHODS_TO_ACCESS as $key=>$val)
			if($key == $methodName)
				foreach($val as $id=>$nameOfSession)
					if(!isset($_SESSION["{$nameOfSession}"]))
						header("Location:" . URL);
	}		
	
    function Bootstrap()
    {
        $this->Definee();
        
        if(empty($_GET['url']) && defined('MAIN_CONTROLLER'))
        {
            $exp = explode('/', MAIN_CONTROLLER);
			
            require CONTROLLERS_PLACE . $exp[0] . '/'. $exp[1] . '.php';
            
            $class = new $exp[1];
            $class->$exp[2]();
            return;
        }
        
        if(isset($_GET['url']))
        {
            $url = explode('/', $_GET['url']);
			
			$this->checkFolders($url[0]);
			$this->checkControllers($url[0] . '/' . $url[1]);
			$this->checkMethods($url[0] . '/' . $url[1] . '/' . $url[2]);
			
			if(preg_match("/\//", $_GET['url']))
			{
            	$give_this_controller = CONTROLLERS_PLACE. $url[0] . '/' . $url[1] . '.php';
			}
			else
			{
				//If we would have opinions, allow code below:
				/*
				$url[0] = "Profile";
				$url[1] = "Opinions";
				$url[2] = "Main";
				$give_this_controller = CONTROLLERS_PLACE. $url[0] . '/' . $url[1] . '.php';
				
				 */
			}
		}
        
		$notFound = 0; //0 is ok, 1 not found controller, 2 not found method
		
        if(file_exists($give_this_controller))
        {
            require $give_this_controller;
            $control = new $url[1];

            $parametres = array();
            for ($i = 3; $i < count($url); $i++)     
                $parametres[] = $url[$i];
                
            if(method_exists($url[1], $url[2]))
                call_user_func_array(array($control, $url[2]), $parametres);
			else 
				$notFound = 2;
        }
		else
		{
			$notFound = 1;
		}
        
		if($notFound > 0)
            echo ERROR_404;
    }
    
    private function Definee()
    {
        $app_place = dirname(__FILE__);
        $app_place = str_replace("\\", '/', $app_place);
        $app_place = str_replace("core", "", $app_place);
        define("APP_PLACE", $app_place);

        define("CONTROLLERS_PLACE", APP_PLACE . 'app/controllers/');
        define("JAVASCRIPT_PLACE", URL . 'app/jsCode/');		
        define("MODELS_PLACE", APP_PLACE . 'app/models/');
        define("VIEWS_PLACE", APP_PLACE . 'app/views/');
        define("TEMPLATE_PLACE", APP_PLACE . 'theme/');
        define("HELPERS_PLACE", APP_PLACE . 'helpers/');
        
        define("THEME_URL", URL . 'theme/');
        
		$url = str_replace("http://", ".", URL);
		define("COOKIES_URL", $url);
		
        define("LIBS_PLACE", 'core/');
        
        define("C", 1);

        if(DEV_STAGE == 'ALL')
            error_reporting(E_ALL ^ E_NOTICE);
        elseif(DEV_STAGE == 'NONE')
            error_reporting(0);
        else
            error_reporting(E_ERROR | E_WARNING | E_PARSE);     
    }
}
?>
