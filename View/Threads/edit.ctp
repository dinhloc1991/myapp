<?php 
echo $this->Form->create("Thread", array("action"=>"edit1","type"=>"post")); 
echo $this->Form->input("threadName", array("label"=>" thread name"));
echo $this->Form->end("Edit");  
?> 