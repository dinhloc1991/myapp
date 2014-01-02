<!-- create a new thread with specific users  --> 
<?php 
//echo $this->Form->create("Message", array("action" => "index", "type" => "post")); 
//echo $this->Form->input("username", array("width"=>"30"));  
//echo $this->Form->end("Add User"); 
?>  
<html>
<style>
#error{
	color: red;
}

#memberList{
	color: green;
}

#dvThread{
	width: 700px;
	height: 400px;
	border-style: solid;
	border-width: 1px;
	border-color: red; 
	overflow: scroll;
}

#chatroom{
	float:left;
}
#dvInput{

}

.hide{
	display: none;
}

#otherroom{
	margin-top: 100px;
	width: 500px; 
	border-style: solid;
	border-width: 1px;
	border-color: red; 
	float:right;
}
</style>
<head>
	<?php echo $this->Html->script(array('jquery.js')); ?>
	<script>
		var getMessage; 
		threadID = -1; 
		$(document).ready(function(){
			$("#ipUser").on("keypress", function(e){
				if (e.which  == 13){
					console.log("nut enter duoc bam");
					addedUserName = $("#ipUser").val(); 
						$.ajax({
							type: "POST",
							data: { "addmember":"true", "username":　"loc"},
							url: "<?php echo Router::url(array('controller'=>'messages','action'=>'checkMember'));?>",
						}).done(function (msg){
							console.log("gia tri message tra ve "+msg);  
							if (msg=="ok"){
								console.log("da co nguoi ten la "+addedUserName);
								if (members.indexOf(addedUserName)==-1){
									members.push(addedUserName);
									$("#memberList").append(addedUserName+ ", ");
								}
								$("#error").html();
							}else {
								console.log("do not exist user "+ addedUserName);
								$("#error").html("error : chua co user ten la "+addedUserName);
							}
						});   
				}
			}); 
		}); 

	</script>
</head>
<body>
	<div id = "chatroom">
		<button id = "btnLogout"> Logout </button> 
		<div id = "createMembers"> 
			Who you want to chat with 
			<input id = "ipUser" type = "text" size = 20 />
			<div id = "memberList" ></div>
			<div id = "error"> 
			</div>
		</div>	
<!-- 
		<div id="createNewThread"><button id = 'newThreadBt'> Create New Thread </button></div> 
		<div id = "dvThread"></div>
		<div id = "dvInput"> 
			Input <input id="tfinput" type="text" size = 30 /> 
			<button id ="btnSend" > Send </button> 

		</div> -->
	</div>
	<div id="otherroom"> 
		
	</div>

</body>

</html>