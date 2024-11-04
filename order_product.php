<?php
### Function1: check cookie
echo "*********************************************************************<br>";
 echo "ToDo function1:<br> ";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Check the login cookie. If users are not logged in, ask them to log in first.<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Please check login.php:setcookie for the login cookie setup. Refer to our slide titled 'Retrieve a Cookie Value' to check login cookie to complete this function. <br>";
echo "*********************************************************************<br><br>";

 ## complete function1 here ......
 ## if .......  die("please login first!");

 ## get login id
 if (isset($_GET['cid']))
    $cid=$_GET['cid'];
 else
        die("please login first!");
 
 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 $sql="select p_id,name,price,quantity,v_id from CPS3740.Products";

 #echo "<br>$sql\n";
 $result = mysqli_query($con, $sql); 

 if($result) { 
	if (mysqli_num_rows($result) > 0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TH>pid<TH>Name<TH>Price<TH>Available QTY<TH>vid<TH>QTY to order\n";
 		while($row = mysqli_fetch_array($result)){
 			$pid=$row['p_id'];
 			$name=$row['name'];
 			$price=$row['price'];
 			$quantity=$row['quantity'];
 			$vid=$row['v_id'];
 			echo "<TR><TD>$pid<TD>$name<TD>$price<TD>$quantity<TD>$vid";
 			echo "<TD><form action='place_order.php' method=GET><input type='hidden' name='cid' value=$cid><input type='hidden' name='pid' value=$pid><input type='text' size=3 name='pid_order_qty' required><input type='submit' value='Place order'></form>\n";
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

