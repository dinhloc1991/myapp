<?php 
class ThreadsController extends AppController{
	public $components = array("Session", "Login", "Common"); 
	public function index(){
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

} 
?>