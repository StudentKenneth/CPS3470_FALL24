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

 if (isset($_GET['cid']))
    $cid=$_GET['cid'];
 else
 	die("please login first!");

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 $sql="select co.oid,p.p_id,p.price,p.quantity as available_qty,p.v_id, co.order_qty,co.order_datetime,p.name from CPS3740_2023F.Order_demo co,CPS3740.Products p where co.cid=$cid and co.pid=p.p_id";

#echo "<br>$sql\n";
$result=false;
try {
    $result = mysqli_query($con,$sql);
} catch (Exception $e) {
  $error=$e->getMessage();
  echo "<br><font color='red'> Database error! " . $error . "</font><br>\n";
}


 if($result) { 
	if (mysqli_num_rows($result) > 0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TH>order id<TH>product name<TH>Price<TH>Available qty<TH>order qty<TH>Vendor ID<TH>date time<TH>actions\n";
 		while($row = mysqli_fetch_array($result)){
 			$price=$row['price'];
 			$available_qty=$row['available_qty'];
 			$pid=$row['p_id'];
 			$vid=$row['v_id'];
 			$oid=$row['oid'];
 			$name=$row['name'];
 			$order_datetime=$row['order_datetime'];
 			$order_qty=$row['order_qty'];
 			echo "<TR><TD>$oid<TD>$name<TD>$price<TD>$available_qty<TD>$order_qty<TD>$vid<TD>$order_datetime<TD><a href='cancel_order.php?cid=$cid&oid=$oid'>Cancel order</a><br>";
 			echo "<form action='change_order.php' method=get><input type='text' name='new_qty' size=3 required><input type='hidden' name='oid' value=$oid><input type='hidden' name='cid' value=$cid><input type='hidden' name='pid' value=$pid><input type='submit' value='Change quantity'></form>\n";
#			echo "<br>----". mysqli_num_rows($result) . "==<br>\n";
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

