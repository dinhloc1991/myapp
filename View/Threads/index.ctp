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

</style>
<head>
	<?php echo $this->Html->script(array('jquery.js')); ?>
	<script>
		$(document).ready(function(){
			$("#tfMessage").on("keypress", function(e){
				if (e.which  == 13){
					console.log("nut enter duoc bam");
					content = $("#tfMessage").val(); 
						$.ajax({
							type: "POST",
							data: { "message":"true", "content":　content},
							url: "<?php echo Router::url(array('controller'=>'messages','action'=>'insertMessage'));?>",
						}).done(function (msg){
							console.log("gia tri tra ve "+msg); 
							$("#thread").append(content+"<br>");
							$("#tfMessage").val("");  
						});   
				}
			}); 

			function getMessageManyTimes(){
		//		var t = setInterval(function(){
					$.ajax({
						type:"POST", 
						url: "<?php echo Router::url(array('controller'=>'messages','action'=>'getAllMessage'));?>", 
					}).done(function (msg){
					//	console.log("gia tri message tra ve "+msg); 
						message_r = JSON.parse(msg) ; 
						for(i = 0; i < message_r.size(); i++){
						 	message = message_r["Message"]["content"];
						 	$("#thread").append(message); 		
						}
					//	console.log(message_r);
			//			$("#thread").html(msg); 
					}); 
		//		},1000);
			}

			// getMessage= function(){
			// 	$.ajax({
			// 		type:"POST", 
			// 		url: "handle.php", 
			// 		data:{"getMessage":"true", "threadID":threadID},
			// 	}).done(function (msg){
			// 		//console.log(msg);
			// 		console.log("gia tri message tra ve "+msg);  
			// 		$("#thread").html(msg); 
			// 	}); 
			// }
			getMessageManyTimes(); 
		}); 

	</script>
<body>
<div id ="threads">
<?php echo $this->element("logout"); ?>
<?php echo "Chao ban ".$this->Session->read("username"); ?> 
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
	//	echo $this->Form->create("Message", array("action" => "insertMessage", "type" => "post")); 
	//	echo $this->Form->input("input", array("label"=>"Input", "id"=>"tfMessage"));  
	//	echo $this->Form->end("Send");
	?>  
	<input type = "text" id = "tfMessage" length = "10px"/> 
</body>
</html>