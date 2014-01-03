<?php 
class UsersController extends AppController {
	public $layout = "layout1"; 
	public function index(){
		$this->redirect(array("controller" => "users", "action"=> "login"));  
	}
	public function login(){
		$this->set("title", "LOGIN PAGE"); 
		if($this->request->is("post")){
			$username = $this->data["User"]["username"]; 
			$password = $this->data["User"]["password"];
			$data = $this->User->find("first", array("conditions" => array("User.username"=> $username, "User.password" => $password)));
			if ($data==null){
			$this->Session->setFlash(__("Dont have member has username ".$username." and password ".$password));
			}else {

				$this->Session->setFlash(__("OK"));
			//	$id = $this->User->getID(array("username"=>$username));
				$id = $this->User->getIdUser($username); 
				$this->Session->setFlash(__("gia tri id cu nguoi dung ".$id)); 
				$this->saveUser($username, $password,$id ); 
				$this->redirect(array("controller" => "threads", "action"=> "index"));  
			}
		}
	}
	public function logout(){
		$this->autoRender = false; 
		$this->unSaveUser(); 
		$this->redirect(array("controller"=> "users", "action"=> "index")); 
	}
	public function register(){
		if ($this->request->is("post")) {
			$this->User->set($this->data); 
			$un = $this->data["User"]["username"]; 
			$pw = $this->data["User"]["password"];
			$pwa = $this->data["User"]["passwordAgain"];
			if ($this->User->validates($this->validate)== true){
				if ($pw == $pwa ) {
					if ($this->User->checkUserExist($un)){
						$this->Session->setFlash(__("This username is used, choose other one")); 
					}else {
						$this->User->insert($un, $pw); 
						$id = $this->User->getInsertId();
						$this->saveUser($un, $pw, $id);  
						$this->redirect(array("controller"=> "threads", "action"=> "index")); 
					}
				}else {
					$this->Session->setFlash(__("2 password are different")); 
				}
			}
		}
	}

	public function saveUser($username, $password, $id){
		$this->Session->write("username", $username);
		$this->Session->write("password", $password);
		$this->Session->write("id", $id); 

	}

	public function unSaveUser(){
		$this->Session->delete("username");
		$this->Session->delete("password");
		$this->Session->delete("id"); 
	}

}
?>