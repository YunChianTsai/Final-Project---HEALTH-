<?php
    session_start();
    require("DBconnect.php");
    $uno = $_SESSION['uno'];

    $g_weight = $_POST["g_weight"];

    $SQL="UPDATE personal SET g_weight='$g_weight' WHERE uno='$uno'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        // echo "alert('Update Successful');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=usermain.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Update Fail');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url= '>";
    }
?>