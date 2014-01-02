<?php 
class LoginComponent extends Component{
	public $components = array("Session"); 
	public function checkLogin(){
		if ($this->Session->check("username")) return true; 
		else return false; 
	}

	

}