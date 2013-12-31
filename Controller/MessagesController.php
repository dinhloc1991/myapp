<?
class MessagesController extends AppController{
//	var $components = array("Common"); 
	public function index(){
		if ($this->request->is("post")){
			$user = $this->data["Message"]["username"]; 
			$this->loadModel("User"); 
			if($this->User->checkUserExist($user)==true){
				$user_r[] = $user; 
				$this->Session->setFlash(__($user)); 
			}else {
				$this->Session->setFlash(__("khong co thang ".$user)); 
			}
		}else {
			$user_r = array() ; 
		}
	}
	public function checkMember(){
		$this->autoRender = false;  
		$this->loadModel("User"); 
		if($this->User->checkUserExist($user)==true){
		
		}else {
			$this->Session->setFlash(__("khong co thang ".$user)); 
		}
	}	
}