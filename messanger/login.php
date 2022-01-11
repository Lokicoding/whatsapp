<!DOCTYPE html>
<html>
	<head>

		
	
		<title>
			Login Page
		</title>
		<style>
			*{
				margin:0px;
				padding:0px;
			}
			
			.body_div{
				height:100vh;
				width:100vw;
				background-color:#079992;
				display:flex;
				justify-content:center;
				align-items:center;
			}
			
			.main_div{
				height:200px;
				width:300px;
				background-color:#dcdde1;
				border-radius:20px;
				box-shadow: 5px 5px 25px rgba(0,0,0,0.5);
				display:flex;
				justify-content:center;
				align-items:center;
			}
			
			.form_div{
				height:90%;
				width:80%;
				align-items:center;
				
			}
			
			.input{
				width:100%;
				height:30px;
				border:1px solid #dcdde1;
				border-radius:10px;
				padding:0px 5px 0px 5px;
				margin-top:10px;
				outline:none;
			}
			
			#submit{
				width:103%;
				height:30px;
				border:1px solid #dcdde1;
				border-radius:10px;
				margin-top:10px;
				outline:none;
				background-color:#26de81;
			}
			
			#submit:hover{
				background-color:#079992;
				color:white;
				transition:0.2s;
				cursor:pointer;
			}
			
			#regester{
				width:103%;
				height:30px;
				border:1px solid #dcdde1;
				border-radius:10px;
				margin-top:10px;
				outline:none;
				background-color:#26de81;
				
			}
			
			
			#regester:hover{
				
				background-color:#079992;
				color:white;
				transition:0.2s;
				cursor:pointer;
			}
		</style>
		
	</head>
	<body>
		<div class="body_div">
			<div class="main_div"> 
				<div class="form_div">
				<form method="post">
					<input class="input" type="text" placeholder="Username" name="name">
					<input class="input" type="password" placeholder="Password" name="password">
					<input  id="submit" type="submit" value="login" name="login">
					<input  id="regester" type="button" value="New User">
				</form>	
				</div>
			</div>
		</div>
		<script src="js/jquery-3.5.1.min.js">
		
		</script>
		<script>
			 $("input").focus(function() { 
				$(this).css("border", "1px solid #079992"); 
			}); 
			
			$("input").focusout(function() { 
				$(this).css("border", "1px solid #dcdde1"); 
			}); 
			
			$("#regester").click(function() { 
				location.href = 'reg.php';
			});
		</script>
		<?php
		
		session_start();
		
			if(isset($_POST["login"]))
			{
				
				$name=$_POST['name'];
				$password=$_POST['password'];
				$dbc=mysqli_connect("localhost","root","","data");
				$q="Select * from data where name='$name' and password='$password'";
				$run=mysqli_query($dbc,$q);
				
				
				if( mysqli_num_rows($run) >0)
				{
					while($rows=mysqli_fetch_array($run,MYSQLI_ASSOC))
					{
						$_SESSION['user_name']=$rows["name"];
						$_SESSION['user_img']=$rows["img"];
						header('location:main.php');
					}
				}
				else
				{
					echo"wrong password";
				}
			}
		?>
	</body>
</html>
