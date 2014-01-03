<?php 
echo $this->Form->create("User", array("action" => "login", "type" => "post", "class"=> "form-group")); 
echo $this->Form->input("username", array("class"=> "page-header")); 
echo $this->Form->input("password", array("type"=>"password", "class"=> "page-header")); 
echo $this->Form->end("Login", array("class"=> "btn btn-primary btn-lg")); 
echo $this->Html->link(
	"Register an account here", "/users/register"); 