<?php 
echo $this->Form->create("User", array("action"=> "register", "type"=>"post")); 
echo $this->Form->input("username", array("columns"=>10)); 
echo $this->Form->input("password", array("type"=>"password")); 
echo $this->Form->input("passwordAgain", array("type"=> "password", "label"=> "Enter password again")); 
echo $this->Form->end("Create"); 