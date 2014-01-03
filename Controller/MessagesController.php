<?
class MessagesController extends AppController{
	public $components = array("Common"); 
	public function index(){
		// if ($this->request->is("post")){
		// 	$user = $this->data["Message"]["username"]; 
		// 	$this->loadModel("User"); 
		// 	if($this->User->checkUserExist($user)==true){
		// 		$user_r[] = $user; 
		// 		$this->Session->setFlash(__($user)); 
		// 	}else {
		// 		$this->Session->setFlash(__("khong co thang ".$user)); 
		// 	}
		// }else {
		// 	$user_r = array() ; 
		// }
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
		$threadIDTmp = $this->Session->read("threadIDTmp"); 
		$data =  $this->Message->find("all", array("conditions"=>array("threadID"=>$threadIDTmp))); 
	//	$return = ""; 
		// foreach($data as $item){
		// 	$return = $return.$item["Message"]["content"].",";
		// }
		echo json_encode($data); //$return; 
	}

	public function edit(){       //phai kiem tra truoc xem co phai tin nhan cua no khong
		$this->autoRender = false; 
		$id = $this->data["idMs"]; 
		$newContent = $this->data["newContent"]; 
		if ($this->checkOwner($id)){ 
			$time = date("Y-m-d H:i:s");
			$this->Message->updateAll(array("content"=> "'".$newContent."'", "time"=>"'".$time."'"), array("id"=>$id)); 
			echo "ok"; 
		}else {
			echo ("fail"); 
		}
	}
	public function remove(){   //phai kiem tra xem co phai tin nhan cua no khong 
		$this->autoRender = false;
		$id = $this->data["idMs"]; 
		if ($this->checkOwner($id)){
			$this->Message->deleteAll(array("ID"=> $id)); 
		}else echo "fail"; 
	}
	public function getMessageByThreadId($threadID){
		if ($this->request->is("get")){
			 $this->Session->write("threadIDTmp", $threadID); 
			 $this->redirect(array("controller"=>"messages", "action"=>"index")); 
		}
	}
	public function checkOwner($id){
		$userID = $this->Session->read("id"); 
		$msowner = $this->getOwner($id); 
		if ($userID == $msowner) return true; 
		else return false; 
	}
	public function getOwner($id){
		$res = $this->Message->find("first", array("conditions"=>array("ID"=>$id))); 
	//	var_dump($res); 
		return $res["Message"]["ownerID"]; 

	}

}