<?php
  setcookie("login_id","",time());
  unset($_COOKIE['login_id']);
 echo "You successfully logout<br>\n";
?>
