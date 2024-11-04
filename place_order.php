<?php
### Function1: check cookie
echo "*********************************************************************<br>";
 echo "ToDo function1:<br> ";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Check the login cookie. If users are not logged in, ask them to log in first.<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "      Please check login.php:setcookie for the login cookie setup. Refer to our slide titled 'Retrieve a Cookie Value' to check login cookie to complete this function. <br>";
echo "*********************************************************************<br>";

 ## complete function1 here ......
 ## if ....... 	die("please login first!");


### Function2: Step1: validate user input ##### 
 echo "ToDo function2:<br> ";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo "Step1:Validate user input. If the user input quantity format is not correct, display the error message and stop the program. <br> ";

 if (isset($_GET['pid']))
    $pid=$_GET['pid'];
 else
 	die("Invalid product id in the order!");

 if (isset($_GET['pid_order_qty']))
    $pid_order_qty=$_GET['pid_order_qty'];
 else
   die("Missing the order quantity. The order has not been successfully placed.\n");

 if (!is_numeric($pid_order_qty))
   die("The order quantity must be a number. The order has not been successfully placed.\n");

 if ((int)$pid_order_qty!= $pid_order_qty)
   die("The order quantity must be an integer. The order has not been successfully placed.\n");

 if ($pid_order_qty < 0)
   die("The order quantity must be > 0. The order has not been successfully placed.\n");


### Function2:Step1(additional validation)& Step2(insert user order to table) 
echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "Step1(additional validation):If the user input quantity is less than the available quantity,display the error message and stop the program.<br>";
echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
echo "Step 2: If the user input quantity is validated, then insert the order into your table (e.g., CPS3740_2024S.Order_demo table). Then display a message to users (e.g., 'Insert xxxx successfully').<br>";

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

 #echo "$sql";
 # complete code here...........
 #

 mysqli_close($con); 
?>

