<?php 
echo $this->Form->create("Thread", array("action" => "createNewThread", "type" => "post")); 
echo $this->Form->input("threadName", array("label"=>"Thread Name"));  
echo $this->Form->end("Create"); 
