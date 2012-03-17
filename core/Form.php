<?php

class Form
{
    public $errors = array();
    private $css_id;
    
    function create($action, $method, $css_id = "post_error", $add = NULL)
    {
        $this->css_id = $css_id;
        
        if(!empty($action))
            $action = URL . $action;
        
        echo "<form action = \"{$action}\" method = \"{$method}\">";
    }
    
    function input($type, $name, $value = NULL, $add = NULL)
    {
        if(!empty($_POST[$name]))
            $value = $_POST[$name];
        
        echo "<input type=\"{$type}\" name=\"{$name}\" value=\"{$value}\" {$add} />";
        
        if(!empty($this->errors[$name]))
            echo "<span id=\"{$this->css_id}\">{$this->errors[$name]}</span>";
    }
    
    function textarea($name, $value = NULL, $add = NULL)
    {
        if(!empty($_POST[$name]))
            $value = $_POST[$name];
        
        echo "<textarea name=\"{$name}\" {$add} />{$value}</textarea>";
        
        if(!empty($this->errors[$name]))
            echo "<span id=\"{$this->css_id}\">{$this->errors[$name]}</span>";        
    }    
    
    function select($name, $add = NULL)
    {
        echo "<select name=\"{$name}\" {$add} />";
        
        if(!empty($this->errors[$name]))
            echo "<span id=\"{$this->css_id}\">{$this->errors[$name]}</span>";
    }    
    
    function end($name, $value, $add = NULL)
    {
        echo "<input type=\"submit\" name=\"{$name}\" value=\"{$value}\" {$add} />";
        echo "</form>";
    }
    
    function check_post($array_val, $array_to_check)
    {
        $arr = $array_val;
        $arr_post = $array_to_check;
        
        foreach($arr as $key)
        {
            if(!empty($key['NotEmpty']))
                if(empty($arr_post[$key['name']]))
                    $this->errors[$key['name']] = $key['NotEmpty'];
           
            if(!empty($key['MinLength']))
                if(strlen($arr_post[$key['name']]) < $key['MinVal'])
                    $this->errors[$key['name']] = $key['MinLength'];   
                
            if(!empty($key['MaxLength']))
                if(strlen($arr_post[$key['name']]) > $key['MaxVal'])
                    $this->errors[$key['name']] = $key['MaxLength'];                   
        }
        
        return $this->errors;
    }   
}
?>
