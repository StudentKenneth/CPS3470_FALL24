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

 if (isset($_GET['oid']))
    $oid=$_GET['oid'];
 else
 	die("please select an order to change!");

 include "../config/dbconfig_project.php";

 $con = mysqli_connect($host, $username, $password, $dbname) 
 or die("<br>Cannot connect to DB:$dbname on $host\n");

### Function2: Cancel order : delete the record from database
 echo "ToDo function2: Cancel order:delete the record from database<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo " (1) Remove the user's order from the database.<br>";
 echo "      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo " (2) Display proper message to the user.<br>";
 ### complete delete function here........


?>

