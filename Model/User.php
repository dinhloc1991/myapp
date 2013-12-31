<?php 
class User extends AppModel{
	public $name = "users"; 

	public function checkUserExist($username){
		$sql = array("conditions"=>array( "username"=>$username));
	//	$data = $this->User->find("first", array("conditions" => array("User.username"=> $username, "User.password" => $password)));

		$data = $this->find("all", $sql);  
		if ($data==null) return false; 
		else return true; 
	}
}