<?php 
class Message extends AppModel{
	public $name = "messages";
	public $primaryKey = "ID";  
	// public function update($id, $newContent){
	// 	$time = date("Y-m-d H:i:s");
	// 	$this->update(array("content"=> $newContent, "time"=>$time), array("id"=>$id)); 
	// }
	public function remove($id){

	}
	public function deleteByThreadID($id){
		$this->deleteAll(array("threadID"=>$id)); 
	}
	
}