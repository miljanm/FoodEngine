<?php

class Controller
{
    public $header = 'header';
    public $footer = 'footer';
    public $header_title = HEADER_TITLE;
    public $meta_desc = META_DESC;
    public $ajax = false;
    
    function __construct() 
    {   
        //If it's call from js, don't load it
        if(!$this->ajax) $this->loadTemplate($this->header);
        
        $this->db = new Database;
        $this->form = new Form;
		$this->validate = new Validation;
    }
    
    public function loadHelper($par) 
    {
        require HELPERS_PLACE . $par . '.php';
    }
    
    public function loadTemplate($par)
    {
        require TEMPLATE_PLACE . $par . '.php';
    }
	
	public function loadJs($par)
    {
        echo '<script src="' . JAVASCRIPT_PLACE . $par . '.js"></script>';
    }
    
    public function loadModel($model, $name = NULL)
    {
        require MODELS_PLACE . $model . '.php';
        
        if(!isset($name))
            $name = $model;
        
        $model = ucfirst($model);
        
        $this->$name = new $model;
    }
	
	public function redirect($string)
	{
		header('Location: ' . URL . $string);
		die();
	}
    
    public function loadView($par, $data = array())
    {
    	extract($data);
		
        require VIEWS_PLACE . $par . '.php';
    }
	
	public function safeString($string)
	{
		return mysql_escape_string(htmlspecialchars($string));
	}
    
    function __destruct() 
    {   
        //If it's call from js, don't load it
        if(!$this->ajax) $this->loadTemplate($this->footer);
    }
}

?>
