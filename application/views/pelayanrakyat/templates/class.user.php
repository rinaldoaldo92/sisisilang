<?php
class USER
{	

	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
	
	public function register($nama, $username, $email, $password)
	{
		try
		{
			$new_password = password_hash($password, PASSWORD_DEFAULT);
			
			$stmt = $this->db->prepare("INSERT INTO pengguna_standar(nama, username, email, password) 
		                                               VALUES(:nama, :username, :email, :password)");
			$stmt->bindparam(":nama", $nama);												  
			$stmt->bindparam(":username", $username);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":password", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function masuk($username, $email, $password)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT id, username, email, password FROM adminsisisilang WHERE username=:username OR email=:email ");
			$stmt->execute(array(':username'=>$username, ':email'=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($password, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}

	public function is_notlogin() {
		if(isset($_SESSION['user_session'])) {
			return false;
		}
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>