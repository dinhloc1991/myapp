<html>
<style>
#error{
	color: red;
}

#memberList{
	color: green;
}
#thread{
	width: 700px;
	height: 400px;
	border-style: solid;
	border-width: 1px;
	border-color: red; 
	overflow: scroll;
	 
}
/*#threads{
}


.hide{
	display: none;
}

threadContent{
	margin-top: 100px;
	width: 500px; 
	border-style: solid;
	border-width: 1px;
	border-color: red; 
}*/
</style>
<div id ="threads"> 
<?php echo $this->Html->link("Create a new thread", "/threads/createNewThread") ; 
foreach($threads as $item){
	echo "<div>".$item['Thread']['threadName']." --- ".$item['Thread']['time']."</div>" ; 
}?>
</div> 
<?if (isset($threadTmp)) {
	echo $threadTmp;
	}
?> <div id="thread"></div>
	<?php 
		echo $this->Form->create("Thread", array("action" => "insertMessage", "type" => "post")); 
		echo $this->Form->input("input", array("label"=>"Input"));  
		echo $this->Form->end("Send");
	?>  
</html>