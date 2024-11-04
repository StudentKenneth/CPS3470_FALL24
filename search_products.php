<?php

 include "../config/dbconfig_project.php";

 if (isset($_GET['myproduct']))
 	$myproduct=$_GET['myproduct'];
 else
 	$myproduct="*";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 $sql="select p_id,name,price,quantity,v_id from CPS3740.Products";

 if ($myproduct!="*")
 	$sql = $sql . " where name like '%" . $myproduct . "%'";
 
 #echo "<br>$sql\n";
 $result = mysqli_query($con, $sql); 

 echo "The results of your search keyword '$myproduct':";
 if($result) { 
	if (mysqli_num_rows($result) > 0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TH>pid<TH>Name<TH>Price<TH>QTY<TH>vid\n";
 		while($row = mysqli_fetch_array($result)){
 			$pid=$row['p_id'];
 			$name=$row['name'];
 			$price=$row['price'];
 			$quantity=$row['quantity'];
 			$vid=$row['v_id'];
 			echo "<TR><TD>$pid<TD>$name<TD>$price<TD>$quantity<TD>$vid\n";
 		}
 		echo "</TABLE>\n";
 	} else {
 		echo "<br>No product found.\n";
 	}
 	mysqli_free_result($result);

 } else {
 	echo "<br>Something wrong with the database or SQL query.\n" ;
 	echo "<br>Error message: " . mysqli_error();
 }
 mysqli_close($con); 
?>

