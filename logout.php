<?php
session_start();
session_destroy();
setcookie("uid",$uid,time()-36);
header('Location: login.php');
?>