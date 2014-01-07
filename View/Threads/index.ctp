<html>	

<?php echo "<h3> Hello ".$this->Session->read("username"). "</h2>"  ?> 	
<?php echo $this->element("logout"); ?> 
<?php echo $this->Html->link("Create a new thread", "/threads/createNewThread") ; 	?>	
<div id ="threads">
	<table class="table table-striped">
<?php 
	foreach($threads as $item){
		echo "<tr>"; 
			echo "<td> ".$this->Html->link($item['Thread']['threadName'], array("controller"=>"messages", "action"=>"getMessageByThreadID", $item["Thread"]["threadID"]))."<td>"; 
			echo "<td> ".$item['Thread']['time']. " </td> ";
			echo "<td>".$this->Html->link("Remove", array("controller" => "threads", "action"=> "remove", $item["Thread"]["threadID"])); 
			echo "|"; 
			echo $this->Html->link("Edit", array("controller"=>"threads", "action"=>"edit", $item["Thread"]["threadID"]))."</td>"; 
		echo "<tr>" ; 
	}
?>
	</table>
</div> 