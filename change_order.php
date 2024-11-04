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

### check cid, oid, pid.....  
 if (isset($_GET['cid']))
    $cid=$_GET['cid'];
 else
 	die("please login first!");

 if (isset($_GET['oid']))
    $oid=$_GET['oid'];
 else
 	die("please select an order to change!");

 if (isset($_GET['pid']))
    $pid=$_GET['pid'];
 else
 	die("Invalid product id in the order!");

 if (isset($_GET['new_qty']))
    $new_qty=$_GET['new_qty'];
 else
 	die("Missing the order quantity.");

 if ($new_qty < 0 || is_int($new_qty))
 	die("The new order quantity must be integer and > 0\n");

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

### Function2: Change order: update the record in the database 
 echo "ToDo Function2: Change order:update the record in the database<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo " (1) Retrieve the user's order from the database.<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo " (2) Validate user input. If the user input quantity format is not correct or the user input quantity is less than the available quantity, display the error message and stop the program. <br> ";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo " (3) If the user input quantity is validated, then update the order in your table (e.g., CPS3740_2024S.Order_demo table). Then display a message to users (e.g., 'xxxx is updated successfully with order quantity:zz. ').<br>"; 

 ### complete delete function here........



 mysqli_close($con); 
?>

