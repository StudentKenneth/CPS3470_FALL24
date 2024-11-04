<?php

 echo "*********************************************************************<br>";
 echo "ToDo function:<br> ";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Check whether the client's IP address is inside Kean University or not.<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Please refer to our slide: \"Class exercises - client’s IP  address\" to complete this function. <br><br>";
 echo "*********************************************************************<br>";

 
 if (isset($_POST['username']))
   $browser_username=$_POST['username'];
 else 
   $browser_username="";

 if (isset($_POST['password']))
   $browser_password=$_POST['password'];
 else 
   $browser_password="";

 if ($browser_password=="" || $browser_username=="")
   die("<br>Please enter login and password.\n");  

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 $sql="select id,login,password,name,gender,dob,img, state, city, timestampdiff(YEAR,dob,now()) age,street,zipcode from CPS3740.Customers where login = '$browser_username' ";

 #echo "<br>$sql\n";

 $result = mysqli_query($con, $sql); 

 if($result) { 
	if (mysqli_num_rows($result) > 0) {

 		while($row = mysqli_fetch_array($result)){
 			$login=$row['login'];
 			$login_password=$row['password'];
 			if ($browser_password == $login_password) {
# 				echo "<br>Login successful!.\n";
 				setcookie("login_id",$login,time()+60*60);
 				$cid=$row['id'];
 				$street=$row['street'];
 				$zipcode=$row['zipcode'];
 				$state=$row['state'];
 				$city=$row['city'];
 				$gender=$row['gender'];
 				$img=$row['img'];
 				$dob=$row['dob'];
 				$name=$row['name'];
				$age=$row['age'];
				echo "<br>Welcome customer: $name\n";
				echo "<br>Gender: $gender\n";
				echo "<br>DOB: $dob, age: $age\n";
				echo "<br>Address: $street, $city, $state, $zipcode\n";			
				echo '<br><img src="data:image/jpeg;base64,'.base64_encode($img).'"/>';

 				echo "<br><br><a href='mylogout.php'>Logout</a>";
 				echo "<br><a href='order_product.php?cid=$cid'>Order Product";
 				echo "<br><a href='view_orders.php?cid=$cid'>View, change, cancel my order history ";
 			}
 			else
 				echo "<br>Login failed!.\n";
 		}
 	} else {
 		echo "<br>No such person: $browser_username.\n";
 	}
 	mysqli_free_result($result);
 } else {
 	echo "<br>Something wrong with the database or SQL query.\n" ;
 	echo "<br>Error message: " . mysqli_error($con);
 }
 mysqli_close($con); 
?>

