<?php
session_start();
if(isset($_POST['name1'])){
	$name=$_SESSION['user_name'];
	$friend=$_POST['name1'];
$dbc = mysqli_connect("localhost","root","","data");


			$q2="SELECT * FROM `message` WHERE sender in ('$name','$friend') and receiver in ('$friend','$name')";
			$run2=mysqli_query($dbc,$q2);
			
			if( mysqli_num_rows($run2) > 0 )
			{ 
				while($rows=mysqli_fetch_array($run2,MYSQLI_ASSOC))
				{
					if($rows['sender']==$name){
					echo "<div id='righ_msg' >
							<p class='sender_msg'>".$rows['msg']."</p>
						</div>";
					}
					else{
						echo "<div id='righ_msg' style='float:left;background:#485460;'>
							<p class='sender_msg'>".$rows['msg']."</p>
						</div>";
					}
				}
			}
}
?>