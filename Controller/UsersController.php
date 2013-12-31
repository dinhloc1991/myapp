<?php 
class UsersController extends AppController {
	
	public function index(){
		$this->redirect(array("controller" => "users", "action"=> "login"));  
	}
	public function login(){
		if($this->request->is("post")){
			$username = $this->data["User"]["username"]; 
			$password = $this->data["User"]["password"];
			$data = $this->User->find("first", array("conditions" => array("User.username"=> $username, "User.password" => $password)));
			if ($data==null){
			$this->Session->setFlash(__("Dont have member has username ".$username." and password ".$password));
			}else {
				$this->Session->setFlash(__("OK"));
				$this->redirect(array("controller" => "threads", "action"=> "index"));  
			}
		}
	}
	public function logout(){

	}


	

}
?>