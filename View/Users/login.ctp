<div class = "btn btn-primary btn-lg" > 
<?php 
echo $this->Form->create("User", array("action" => "login", "type" => "post")); 
echo $this->Form->input("username", array("class"=> "form-control", "label"=>"Username   ")); 
echo $this->Form->input("password", array("type"=>"password", "class"=>"form-control", "lebel"=>"Password  ")); 
echo $this->Form->end(array("label"=>"Login", "class"=>'btn btn-success btn-lg')); 
echo $this->Html->link(
	"Register an account here", "/users/register",array('class'=>'btn btn-success btn-lg')); 
?>
</div> 