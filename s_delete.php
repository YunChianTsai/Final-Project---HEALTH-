<?php
session_start();
require("DBconnect.php");

$sname=$_SESSION["sname"];
$SQL="DELETE FROM sportlist WHERE sname='$sname'";

// if($ans == true){
//     $SQL="DELETE FROM user WHERE uno='$uno'";
    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        // echo "alert('Delete Successful');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=sport_mng.php'>";
        //header('Location: list.php');
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('DELETE Fail');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=sport_mng.php'>";
        //header('Location: list.php');
    }
// }else{
//     header('Location: user_mng.php');
// }

?>