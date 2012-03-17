<?	
//ini_set('display_errors','On');

session_start(); ob_start();

foreach (glob("core/*.php") as $filename)
    require $filename;
    
include 'config/config.php';

foreach (glob("global/*.php") as $filename)
    require $filename;
    
new Bootstrap();
?>
