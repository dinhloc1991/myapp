<div style="width:200px" > 
<?php 
echo $this->Form->create("User", array("action"=> "register", "type"=>"post")); 
echo $this->Form->input("username", array("class"=> "form-control", "size"=>"10px", "maxlength"=>"40px")); 
echo $this->Form->input("password", array("type"=>"password", "class"=> "form-control")); 
echo $this->Form->input("passwordAgain", array("type"=> "password", "label"=> "Enter password again", "class"=> "form-control")); 
?> 
<div style="margin-top:5px"> <?php echo $this->Form->end(array("label"=>"Register", "class"=>'btn btn-success btn-lg')); 
?></div>
</div>