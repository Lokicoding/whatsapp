<?php
				
				SESSION_start();
				if(isset($_POST['login']))
				{
					
					$uname=$_POST['name'];
					$pass=$_POST['password'];
					$email=$_POST['email'];
					$phone=$_POST['phone'];
					$dbc=mysqli_connect("localhost","root","","data");
					$q="create table $uname(
					id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(25) NOT NULL,
					password VARCHAR(50) NOT NULL,
					email VARCHAR(50) NOT NULL,
					phone VARCHAR(20) NOT NULL,
                    status VARCHAR(10) NOT NULL,
                    time VARCHAR(50) NOT NULL,
                    date VARCHAR(50) NOT NULL,,
                    sender VARCHAR(25) NOT NULL,
                    receiver VARCHAR(25) NOT NULL
					message VARCHAR(2500) NOT NULL
					)";
					$a=mysqli_query($dbc,$q);
					$q2="INSERT INTO $uname (name,password) VALUES('$uname','$pass')";
					$b=mysqli_query($dbc,$q2);
					if($a){echo "run";} else {echo "not run";}
					if($b)
					{
						header('location:index.html');
					}
				
				}
				
				
?>