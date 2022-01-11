<?php
   if(isset($_POST['name1']))
   {
		$name=$_POST['name1'];
		$dbc=mysqli_connect("localhost","root","","data");
		$q="Select * from data WHERE name='$name'"; 
		$run=mysqli_query($dbc,$q);				
		if( mysqli_num_rows($run) >0)
		{
			while($rows=mysqli_fetch_array($run,MYSQLI_ASSOC))
			{
				echo $name=$rows['name'];
				//echo $img=$rows['img'];
			}
		}			
   } 
?>