<?php

class Model
{
    function __construct()
    {
        $this->db   = new Database();
        $this->form = new Form();
    }
    
    function save($string) 
    {
        return mysql_escape_string(htmlspecialchars($string));
    }
}

?>
