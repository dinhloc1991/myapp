<?php 
echo $this->Form->create("Thread", array("action" => "createNewThread", "type" => "post")); 
?> 
 <div style ="width:500px">
 Thread Name 
<?php
echo $this->Form->input("threadName", array("label"=>false, "class"=>"form-control", "style"=>"margin:5px"));  
echo $this->Form->end(array("label"=>"Create", "class"=>"btn btn-warning")); 
?> 
</div> 