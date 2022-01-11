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
				height:230px;
				width:320px;
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
			
			#login{
				width:103%;
				height:30px;
				border:1px solid #dcdde1;
				border-radius:10px;
				margin-top:10px;
				outline:none;
				background-color:#26de81;
			}
			
			#login:hover{
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
				<form method="post" enctype="multipart/form-data">
					<input type="file" name="uploadimg">
					<input class="input" type="text" placeholder="Username" name="name">
					<input class="input" type="password" placeholder="Password" name="password">
					<input  id="regester" type="submit" value="Regester" name="Regester">
					<input  id="login" type="button" value="Login Here">
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
			
			$("#login").click(function() { 
				location.href = 'login.php';
			});
		</script>
<?php
	SESSION_start();
	if(isset($_POST['Regester']))
	{			
					$name=$_POST['name'];
					$password=$_POST['password'];
					
					$imgname = $_FILES["uploadimg"]["name"]; 
					
					$tempname = $_FILES["uploadimg"]["tmp_name"];     
					
					$folder = "DP/".$imgname;
					
					$dbc=mysqli_connect("localhost","root","","data");
					
					$q="INSERT INTO `data`(`name`,`password`,`img`) VALUES ('$name','$password','$imgname')";
					$a=mysqli_query($dbc,$q);
					
					 //Now let's move the uploaded image into the folder: image 
					 
					if($a)
					{echo "run";} 
					else 
					{echo "not run";}
					if($a)
					{
						if (move_uploaded_file($tempname, $folder))  
						{ 
							$msg = "Image uploaded successfully"; 
						}
						else
						{ 
							$msg = "Failed to upload image"; 
						}
						$_SESSION["user"]=$name;
						$_SESSION["img"]=$imgname;
						header('location:login.php');
					}
	} 
	
?>
	</body>
</html>