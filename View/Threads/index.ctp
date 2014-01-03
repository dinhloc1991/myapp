<html>	
<?php echo $this->element("logout"); ?>
<?php echo "<label > Hello ".$this->Session->read("username"). "</label>"  ?> 
<?php echo $this->Html->link("Create a new thread", "/threads/createNewThread") ; 	?>		
<table id ="threads"　class="table table-striped">
<?php 
	foreach($threads as $item){
		echo "<tr>"; 
			echo "<td> ".$this->Html->link($item['Thread']['threadName'], array("controller"=>"messages", "action"=>"getMessageByThreadID", $item["Thread"]["threadID"]))."<td>"; 
			echo "<td> ".$item['Thread']['time']. " </td> ";
			echo "<td>".$this->Html->link("Remove", array("controller" => "threads", "action"=> "remove", $item["Thread"]["threadID"])); 
			echo $this->Html->link("Edit", array("controller"=>"threads", "action"=>"edit", $item["Thread"]["threadID"]))."</td>"; 
		echo "<tr>" ; 
	}
?>
</table> 
</body>
</html>