<?php

//General info
define('URL', 'http://soba.cs.man.ac.uk/~markevt1/Z6/'); //must end with /
define('HEADER_TITLE', 'Food engine');
define('META_DESC', 'Find food fast');
define('DEV_STAGE', 'ALL'); //ALL - all errors will be shown | WARN - only warnings / NONE - no errors will be shown
define('MAIN_CONTROLLER', 'MainPage/Index/mainPage'); //folder/controller/method
define('DB_FAIL', 'Something is wrong, contact administrator.'); //What we say when query fails?
define('ERROR_404', '<p><center><h1>This page doesn\'t exist!</h1></center></p>');

//Database info
define('HOST', 'localhost');
define('DB_NAME', '11_COMP10120_Z6');
define('USER', '11_COMP10120_Z6');
define('PASS', 'VuARrLp9WzEtviCc');

//Your definitions
define("mem_localhost", "localhost", true);
define("mem_port", 11211, true);

/* 
 * Arrays for protecting folders, controllers & methods if user is not logged in
 * 
 * Examples:
 * 
 * $FOLDERS_TO_ACCESS = array("Chat"=>array("id", "loggedIn", "username"));
 * Above example shows that if user doesn't have session[id || loggedIn || username], 
 * he will not be able to access Chat folder
 * 
 * $CONTROLLERS_TO_ACCESS = array("Chat/Search"=>array("id", "loggedIn", "username"));
 * Above example shows that if user doesn't have session[id || loggedIn || username], 
 * he will not be able to access Controllers Search in Chat folder
 * 
 * $METHODS_TO_ACCESS = array("Admin/editUsers/add"=>array("admin"));
 * Above example shows that if user doesn't have session[admin], 
 * he will not be able to access method add in editUsers controller which 
 * is in Admin folder
 * 
*/
define("NO_ACCESS_MESSAGE", "Sorry, you can't access this page.");
class Auth
{
	static public $FOLDERS_TO_ACCESS 	 = array();
	static public $CONTROLLERS_TO_ACCESS = array();
	static public $METHODS_TO_ACCESS     = array();
}
?>
