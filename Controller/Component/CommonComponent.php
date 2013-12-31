<?php
class CommonComponent extends Object {
	
	//called before Controller::beforeFilter()

    function initialize(&$controller, $settings = array()) {

        // saving the controller reference for later use

        $this->controller =& $controller;

    }

 

    //called after Controller::beforeFilter()

    function startup(&$controller) {

               }

 

    //called after Controller::beforeRender()

    function beforeRender(&$controller) {

    }

 

    //called after Controller::render()

    function shutdown(&$controller) {

    }

 

    //called before Controller::redirect()

    function beforeRedirect(&$controller, $url, $status=null, $exit=true) {

    }

 

    function redirectSomewhere($value) {

        // utilizing a controller method

    }

	
}