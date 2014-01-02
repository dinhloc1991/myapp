<?php 
class CommonComponent extends Component {
    public $components = array("Session"); 
    public function setThreadTmp($threadname){
        $this->Thread = ClassRegistry::init('Thread');
        
    }
}
