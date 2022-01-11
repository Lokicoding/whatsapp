<?php
	session_start();
	if(isset($_POST["name1"]))
	{	
			$name=$_SESSION['user_name'];
			$friend=$_POST["name1"];			
			$msg=$_POST["msg"];
			$dbc=mysqli_connect("localhost","root","","data");
			$sq="SELECT `id` FROM `data` WHERE name='$name'";
			
			$run_sq=mysqli_query($dbc,$sq);
			if(mysqli_num_rows($run_sq)>0)
			{
				while($rows=mysqli_fetch_array($run_sq,MYSQLI_ASSOC))
				{
					$sender_id=$rows['id'];
				}
			}
			
			$rq="SELECT `id` FROM `data` WHERE name='$friend'";
			$run_rq=mysqli_query($dbc,$rq);
			if(mysqli_num_rows($run_rq)>0)
			{
				while($rows=mysqli_fetch_array($run_rq,MYSQLI_ASSOC))
				{
					$receiver_id=$rows['id'];
				}
			}
			
			
			$q="INSERT INTO `message`(`sender_id`,`receiver_id`,`sender`, `receiver`, `msg`) VALUES ('$sender_id','$receiver_id','$name','$friend','$msg')";
			$run=mysqli_query($dbc,$q);
			$q2="SELECT msg FROM `message` WHERE sender='$name' and receiver='$friend'";
			$run2=mysqli_query($dbc,$q2);
			
			if(mysqli_num_rows($run2)>0)
			{
				while($rows=mysqli_fetch_array($run2,MYSQLI_ASSOC))
				{
					echo "<div id='righ_msg'>
							<p class='sender_msg'>".$rows['msg']."</p>
						</div>";
				}
			}
			
	}
	
	
?>