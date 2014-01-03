<?php 
class ThreadsController extends AppController{
	public $components = array("Session", "Login", "Common"); 
	public $layout = "layout1"; 

	public function index(){
		$this->set("title",  "THREAD PAGE"); 
		if 	(!$this->Login->checkLogin()) return $this->redirect(array("controller"=>"users", "action"=>"login")); 
		$threads = $this->Thread->find("all", array( "order"=>array("Thread.threadID" => "desc")));
		$this->set("threads", $threads); 
		
	}
	public function createNewThread(){
		if ($this->request->is("post")){
			$threadName = $this->data["Thread"]["threadName"]; 
			$time = date("Y-m-d H:i:s");
 			$ownerID = $this->Session->read("id"); 
			$this->Thread->save(array("threadName" => $threadName, "ownerID" => $ownerID, "time" => $time));  
			$this->Session->write("threadIDTmp", $this->Thread->getInsertId()); 
   		    $this->Session->write("threadTmp", $threadname); 
			$this->redirect(array("action"=> "index")); 
		}
	}
	public function remove($id){
		if ($this->request->is("get")){
			$this->Thread->delete($id); 
			$this->loadModel("Message");
			$this->Message->deleteByThreadId($id); 
			return $this->redirect(array("action"=>"index"));   

		}
	}
	public function edit($id){
		if ($this->request->is("get")){
			$this->Session->write("msTmp", $id); 
			
		}
	}
	public function edit1(){
		if ($this->request->is("post")){
			$name = $this->data["Thread"]["threadName"]; 
			$time = date("Y-m-d H:i:s");
			$id = $this->Session->read("msTmp");
			$this->Thread->updateAll(array("threadName"=>"'".$name."'", "time"=>"'".$time."'"), array("threadID"=>$id)); 
			$this->Session->delete("msTmp"); 
			return $this->redirect(array("action"=>"index")); 
		}
	}


} 
?>