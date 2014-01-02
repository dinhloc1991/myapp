<?php 
class Thread extends AppModel {
	public $name = "threads"; 
//	public $components = array("Session"); 
	public function insertAThread($threadName){
		$time = date("Y-m-d H:i:s");
//		$ownerID = $this->Session->read("id"); 
		$this->save(array("threadName" => $threadName, "ownerID" => $ownerID, "time" => $time)); 
		
	}


}