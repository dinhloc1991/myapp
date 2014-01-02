<?
class MessagesController extends AppController{
	public $components = array("Common"); 
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
	//	if($this->User->checkUserExist($user)==true){
			$this->Session->setFlash(__("ok co thang nay")); 
		// }else {
		// 	$this->Session->setFlash(__("khong co thang ".$user)); 
		// }
	}	
	public function insertMessage(){
		$this->autoRender = false; 
		if($this->request->is("post")){
			$content = $this->data["content"]; 
			$time = date("Y-m-d H:i:s");
			$threadID = $this->Session->read("threadIDTmp"); 
			$userID = $this->Session->read("id"); 
			$this->Message->save(array("content" => $content, "time" => $time, "threadID" => $threadID, "ownerID" => $userID));  
			echo "ok";  
		}

	}
	public function getAllMessage(){
		$this->autoRender = false; 
		$data =  $this->Message->find("all"); 
		$return = ""; 
		// foreach($data as $item){
		// 	$return = $return.$item["Message"]["content"].",";
		// }
		echo json_encode($data); //$return; 
	}
}