<?

class Database
{
    //Let's connect
    function __construct()
    {
        if(!defined('DB_IN_USE'))
        {
$connection = mysql_connect("ramen.cs.man.ac.uk", "11_COMP10120_Z6",
"VuARrLp9WzEtviCc")
     or die('Could not connect: ' . mysql_error());
mysql_select_db("11_COMP10120_Z6", $connection)
     or die('Could not select database');
            mysql_query("SET NAMES 'utf8'");
            
            define('DB_IN_USE', 1);
        }
    }
    
	function queryPlain($query)
	{
		$this->query = $query;
		$this->makeIt();
	}
	
    function getEverything($table_name)
    {
        $this->query  = "SELECT * FROM {$table_name}";
        $this->makeIt();
        
        $this->return_row = array(); 
        
        while($row = mysql_fetch_array($this->succ_query)) 
                $this->return_row[] = $row;  
            
        return $this->return_row;
    }
    
    function select($table_name, $what, $where_array, $add = NULL, $only_one = false)
    {
        $where_string = "";
        
        foreach($where_array as $key=>$val)
            $where_string .= $key . ' = "' . mysql_real_escape_string($val) . '" AND ';
        
        //Delete last AND
        $where_string = rtrim($where_string, ' AND ');
        
        $this->query  = "SELECT {$what} FROM {$table_name} WHERE {$where_string} {$add}";
        
        $this->makeIt();
         
   		$this->count = mysql_num_rows($this->succ_query);
        
        $this->return_row = array();
        
        if($only_one)
            $this->return_row = mysql_fetch_array($this->succ_query);   
        else
            while($row = mysql_fetch_array($this->succ_query)) 
            	$this->return_row[] = $row;    
        
        return $this->return_row;
    }
    
	function selectPlain($query, $only_one = false)
	{
		$this->query  = $query;
		$this->makeIt();
		
		$this->count = mysql_num_rows($this->succ_query);
		
		$this->return_row = array();
		
        if($only_one)
            $this->return_row = mysql_fetch_array($this->succ_query);   
        else
            while($row = mysql_fetch_array($this->succ_query)) 
            	$this->return_row[] = $row;    
        
        return $this->return_row;		
	}
	
    function insert($table_name, $array, $htmlspec = 1, $add = "") 
    {
        $what   = "";
        $values = "";
        
        foreach($array as $key=>$val)
        {
            $what   .= $key . ', ';
            if($htmlspec)
                $values .= "'" . htmlspecialchars(mysql_real_escape_string($val)) . "'" . ', ';
            else
                $values .= "'" . mysql_real_escape_string($val) . "'" . ', ';
        }
        
        $what   = rtrim($what, ', ');
        $values = rtrim($values, ', ');
        
        $this->query = "INSERT INTO {$table_name} ({$what}) VALUES ({$values})";
        $this->makeIt(); 
        
        return true; //if no dies happened
    }   
    
    function delete($table_name, $where, $add = "")
    {
        $where_string = "";
        
        foreach($where as $key=>$val)
            $where_string .= $key . ' = "' . mysql_real_escape_string($val) . '" AND ';
        
        //Delete last AND
        $where_string = rtrim($where_string, ' AND ');
        
        $this->query = "DELETE FROM `{$table_name}` WHERE {$where_string} {$add}";
        $this->makeIt(); 
        
        return true; //if no dies happened
    }
    
    function update($table_name, $updateLine, $where, $htmlspec = true, $add = "")
    {
    	$upd = "";
    	foreach($updateLine as $key=>$val)
			if($htmlspec)
				$upd .= $key . "= '" . htmlspecialchars($val) . "', ";
			else
				$upd .= $key . "= '" . $val . "', ";
			
		//Delete last ,
		$upd = rtrim($upd, ', ');
		//--------------
		
        $whereString = "";
        foreach($where as $key=>$val)
            $whereString .= $key . ' = "' . mysql_real_escape_string($val) . '" AND ';
        
        //Delete last AND
        $whereString = rtrim($whereString, ' AND ');	
		//--------------	
		
        $this->query = "UPDATE `{$table_name}` SET {$upd} WHERE {$whereString} {$add}";
        $this->makeIt();
        
        return true; //if no dies happened
    }
    
    private function makeIt()
    {
        if(DEV_STAGE == "ALL")
            $this->succ_query = mysql_query($this->query) or die("Error: {$this->query}<br />".mysql_error());   
        else
            $this->succ_query = mysql_query($this->query) or die(DB_FAIL);
    }
}
          
?>
