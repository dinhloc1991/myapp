<?php 
if($this->Session->check("username")) echo $this->Html->link("Logout", "/users/logout", array("class"=>"btn btn-success"));  
?>  