<?php

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 $sql="select id,name,login,password,dob,gender,street,zipcode from CPS3740.Customers";

 $result=mysqli_query($con,$sql);
 
 #echo "<br>SQL:$sql\n";
 
 if($result) { 
	if (mysqli_num_rows($result) > 0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TH>cid<TH>login<TH>password<TH>name<TH>dob<TH>gender<TH>street<TH>zipcode\n";
 		while($row = mysqli_fetch_array($result)){
 			$cid=$row['id'];
 			$name=$row['name'];
 			$login=$row['login'];
 			$password=$row['password'];
 			$dob=$row['dob'];
 			$gender=$row['gender'];
 			$street=$row['street'];
 			$zipcode=$row['zipcode']; 			
 			echo "<TR><TD>$cid<TD>$login<TD>$password<TD>$name<TD>$dob<TD>$gender<TD>$street<TD>$zipcode\n";
 		}
 		echo "</TABLE>\n";
 	} else {
 		echo "<br>No record found.\n";
 	}
 	mysqli_free_result($result);

 } else {
 	echo "<br>Something wrong with the database or SQL query.\n" ;
 	echo "<br>Error message: " . mysqli_error();
 }
 mysqli_close($con); 
?>

