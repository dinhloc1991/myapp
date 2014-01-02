<?php 
class User extends AppModel{
	public $name = "users"; 
	public $validate = array(
		"username" => array(
			"rule"=> array("minLength", 4), 
			"required" => true,
			"allowEmpty" => false,  
			"message" => "Username at least 4 character"
			), 
		"password" => array(
			"rule" => array("minLength", 4), 
			"message" => "Password at least 4 charater"
			), 
		); 
	public function checkUserExist($username){
		$sql = array("conditions"=>array( "username"=>$username));
	//	$data = $this->User->find("first", array("conditions" => array("User.username"=> $username, "User.password" => $password)));

		$data = $this->find("all", $sql);  
		if ($data==null) return false; 
		else return true; 
	}
	public function insert($username, $password){
		$this->save(array("usesrname"=> $username, "password"=> $password));
	}

	public function getIdUser($username){
		$sql = array("conditions"=>array( "username"=>$username));
		$data = $this->find("all", $sql);  
		if ($data==null) return null; 
		else {
			foreach($data as $item){
				$id = $item["User"]["ID"]; 
				return $id; 
			}
		} 
		return null; 
	}
}