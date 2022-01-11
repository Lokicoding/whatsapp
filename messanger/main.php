<!DOCTYPE html>
<?php
	function users(){
		$name=$_SESSION['user_name'];
		$dbc=mysqli_connect("localhost","root","","data");
		$q="Select * from data WHERE name!='$name'"; 
		$run=mysqli_query($dbc,$q);
		
		if( mysqli_num_rows($run) >0)
		{
			while($rows=mysqli_fetch_array($run,MYSQLI_ASSOC))
			{
				$userImage=$rows['img'];
				echo "<div class='user_chat'>
					<div class='user_dp_div'> <img class='user_dp' src='DP/".$userImage."'></div>
		
		<div class='user_msg_div'>
			<div class='user_name'><p class='user_name1'>".$rows['name']."</p></div>
			<div class='recent_msg'><p>yeh bro how are you</p></div>
		</div>						
			<div class='msg_time'></div>
		</div>";
			}
		}
	}
?>				
<html>
	<head>
	<?php 
		session_start();
	?>
		<title>
		</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	</head>
	<body>
		<div class="main_div">
			<div id="edit_profile">
				<div class="back_header">
					<div class="extra_space_div"></div>
					<div class="back_option_div">
						<div class="back_button_div"><i class="fas fa-arrow-left" id="back_btn"></i></div>
						<div class="profile_heading"><h2>Profile</h2></div>
					</div>
				</div>
				
				<div class="big_profile_div">
						<?php
							$name=$_SESSION['user_name'];
							$dbc=mysqli_connect("localhost","root","","data");
							$q="SELECT * FROM `data` WHERE name='$name'";
							$run=mysqli_query($dbc,$q);
							if( mysqli_num_rows($run) >0)
							{
								while($rows=mysqli_fetch_array($run,MYSQLI_ASSOC))
								{
									$userImage=$rows['img'];
								}
							}
							echo "<img id='set_dp' src = 'DP/".$userImage."'>"	
						?>
						
				</div>
				
				<div class="set_name_div">
					<div class="name_lable"><h4>Your Name</h4></div>
					<div class="user_name"><h2 id="user_name"><?php echo $_SESSION['user_name']; ?></h2></div>
				</div>
			</div>
			
			
			<div class="chat_div">
				<div class="header">
					<div id="profile_dp" class="profile_div"><?php echo "<img id='set_dp' src = 'DP/".$userImage."'>"?></div>
					<div id="login_user"><h2><?php echo $_SESSION['user_name']; ?></h2></div>
					<div class="hide_chat"><button id="hide_chat">Hide chat</button></div>
				</div>
				<div class="search_bar">
					<input class="input" type="text" placeholder="Search or Start new Chat">
				</div>
				<div class="main_chat_div">
					
				<!---------------------------------------->	
				<?php echo users(); ?>
				
				<!-------------------------------------------->
				
				</div>
			</div>
			
			<div class="msg_div">
				<div class="user_header_div">
					<div class="user_profile_div">
						<img class="friend_dp" src="img/img1.jpg">
					</div>
					<div class="user_name_div">
						<p class="friend"></p>
					</div>
				</div>
				
				
			
				<div class="chat_box_div">
					<div class="chat_box">
						<div id="righ_msg">
							<p class="sender_msg">hii bro</p>
						</div>
						
						<div id="left_msg">
							<p class="friend_msg">hii bro</p>
						</div>
					</div>
					<div class="msg_input_div">
						<div class="msg_input">
						<form class="msg_form">
							<input id="input_msg" type="text" placeholder="Type a message" name="msg">
						</form>
						</div>
						<div class="button_div">
						<form class="msg_form">
							<button id="send_btn" type="button" name="send_btn">Send</button>
						</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.5.1.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#profile_dp').click(function(){	
					$('#edit_profile').css("display","block");
					$('#edit_profile').css("width","30%");
					$('.back_button_div').css("display","block");
					$('.back_button_div').css("display","flex");
					$('.profile_heading').css("display","block");
					$('.profile_heading').css("display","flex");
					$('.set_name_div').css("display","block");
				});
				
				$('#back_btn').click(function(){
					$('#edit_profile').css("width","0%");
					$('.profile_heading').css("display","none");
					$('.back_button_div').css("display","none");
					$('.set_name_div').css("display","none");
				});
				
				$('.user_chat').click(function(){
					$('.msg_div').css("display","block");
					$('.hide_chat').css("display","block");
					$('.hide_chat').css("display","flex");
				});
				
				$('#hide_chat').click(function(){
					$('.msg_div').css("display","none");
					$('.hide_chat').css("display","none");
				});
				
				$('.user_name1').click(function(){
					
					var name = $(this).text();
					$.ajax({
					url: "name.php",
					
					type: "POST",
					data: { "name1": name},
					success: function (a) {
						$('.friend').html(a);
						var friend_name = a;
						//$(".friend_dp").attr("src","DP/");
					}
					});
					
					function fetch(){
					$.ajax({
					url: "fetch.php",
					
					type: "POST",
					data: { "name1": name},
					success: function (a) {
						$('.chat_box').html("");
						$('.chat_box').append(a);
					}
					});
					}
					
					fetch();
					//setInterval(function(){fetch();},2000);
				});
				
				$('.user_name1').click(function(){
					var name = $(this).text();
					$.ajax({
					url: "img.php",
					type: "POST",
					data: { "name1": name},
					success: function (a) {
						$(".friend_dp").attr("src","DP/"+a);
					}
					});
				});
				
					
					$('#send_btn').click(function(){
					
					var name = $(".friend").text();
					var msg = $('#input_msg').val();
					$.ajax({
					url: "msg_insert.php",
					type: "POST",
					data: { "name1": name,"msg": msg},
					beforeSend:function(){$('#input_msg').val("");},
					success: function (a) {
						//$('.sender_msg').text(a);
						//$('.chat_box').html("");
						$('.chat_box').append("<div id='righ_msg' ><p class='sender_msg'>"+msg+"</p></div>");
						//$(".friend_msg").text(a);
						
						
					}
					});
					
					});
				
				
				
				
				
			});
		</script>
		
	</body>
</html>