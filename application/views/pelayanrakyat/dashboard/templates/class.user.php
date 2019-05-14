<?php
class USER
{	

	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>