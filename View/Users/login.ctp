<?php 
echo $this->Form->create("User", array("action" => "login", "type" => "post")); 
echo $this->Form->input("username", array("width"=>"30")); 
echo $this->Form->input("password", array("type"=>"password")); 
echo $this->Form->end("Login"); 
echo $this->Html->link(
	"Register an account here", "/users/register"); 