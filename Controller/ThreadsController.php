<?php 
class ThreadsController extends AppController{
	public $component = array("Session"); 
	public function index(){
		$threads = $this->Thread->find("all", array( "order"=>array("Thread.threadID" => "desc")));
		$this->set("threads", $threads); 
		if ($this->Session->check("threadTmp")){
			$this->set("threadTmp", $this->Session->read("threadTmp")); 
		}
	}
	public function createNewThread(){
		if ($this->request->is("post")){
			$threadName = $this->data["Thread"]["threadName"]; 
			$this->Thread->insertAThread($threadName); 
			$this->Session->write("threadTmp", $threadName);
			$this->redirect(array("action"=> "index")); 
		}
	}
	public function insertMessage(){
		$message = $this->data["Thread"]["input"]; 
		$this->loadModel($message); 
		$this->Mess
	}
} 
?>