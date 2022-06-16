<?php
    require("DBconnect.php");

    $stype = $_POST["stype"];
    $sname = $_POST["sname"];
    $sunitc = $_POST["sunitc"];
    
    $SQL="INSERT INTO sportlist (stype, sname, sunitc) VALUES ('$stype', '$sname', '$sunitc')";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        // echo "alert('Update Successful');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=sport_mng.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Update Fail');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url= '>";
    }
?>