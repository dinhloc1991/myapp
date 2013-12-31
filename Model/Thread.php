<?php class Thread extends AppModel {
	public $name = "threads"; 
	public function insertAThread($threadName){
		$time = date("Y-m-d H:i:s");
		$this->save(array("threadName" => $threadName, "ownerID" => "1", "time" => $time)); 
	}
}