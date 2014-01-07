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
	overflow: auto;
	 
}

.rmbtn{
	float: right;
}
.edbtn{
	float : right;
}

#msDiv{
	margin-bottom: 20px; 
}
</style>
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
							$("#threadcon").append(content+"<br>");
							$("#tfMessage").val("");  
							document.getElementById('tail').scrollIntoView(); 
						}); 

				}
			}); 

			function getMessageManyTimes(){
				var t = setInterval(function(){
					$.ajax({
						type:"POST", 
						url: "<?php echo Router::url(array('controller'=>'messages','action'=>'getAllMessage'));?>", 
					}).done(function (msg){
					//	console.log("gia tri message tra ve "+msg); 
						message_r = JSON.parse(msg) ; 
						messages = ""; 
						for(i = 0; i < message_r.length; i++){
						 	message = message_r[i]["Message"]["content"];
						 	user = message_r[i]["Message"]["ownerID"]
						 	time = message_r[i]["Message"]["time"]
						 	id = message_r[i]["Message"]["ID"]; 
						 	user = message_r[i]["User"]["username"]
						 	messages = messages + "<div id='msDiv'>" + user + "(" + time + ")" + " : " + message + 
						 	"<button onclick='removeMessage("+id+")' class='btn btn-primary rmbtn'>Remove</button>"+
						 	"<button onclick='editMessage("+id+")' class='btn btn-primary edbtn'>Edit</button> "+ "</div>"; 
						 	console.log(message); 

					//	 	$("#thread").append(message); 		
						}
						$("#threadcon").html(messages); 
					//	$("#tail").before(messages)
					//	console.log(message_r);
			//			$("#thread").html(msg); 
					}); 
				},1000);
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
	
		function removeMessage($idMs){
			console.log("idmessage "+$idMs)
			$.ajax({
				type: "POST", 
				data:{"idMs":$idMs}, 
				url:"<?php echo Router::url(array('controller'=>'messages','action'=>'remove'));?>",  
				success : function(ms){
					console.log(ms); 
					if (ms=="fail"){
						alert("it is not your message"); 
					}
				}, 
				error : function(){
					console.log("problem occur at remove message"); 
				}
			}); 
		}
	
		function editMessage($idMs){
			val = $("#ms"+$idMs).text();
			console.log("gia tri val "+val );  
			ms = prompt("value you want to edit ",val);
			if (ms!=val){
				$.ajax({
				type: "POST", 
				data:{"idMs":$idMs, "newContent":ms}, 
				url:"<?php echo Router::url(array('controller'=>'messages','action'=>'edit'));?>", 
				success : function(ms){
					if (ms=="fail") alert("it is not your message"); 
					console.log(ms); 
				}, 
				error : function(){
					console.log("problem occur at edit message"); 
				}
				}); 
			}
		}


	</script>
</head>
<body>				
<div id="thread"> <div id = "threadcon"> </div>  <div id ="tail"> </div> </div>
	<?php 
	//	echo $this->Form->create("Message", array("action" => "insertMessage", "type" => "post")); 
	//	echo $this->Form->input("input", array("label"=>"Input", "id"=>"tfMessage"));  
	//	echo $this->Form->end("Send");
	?>  
	<div style = "width:500px; margin-top:5px" > <input type = "text" id = "tfMessage" class = "form-control" /> 
</div>
</body>
</html>