<?php
    session_start();
    require("DBconnect.php");
    $uno = $_SESSION['uno'];

    $uname = $_POST["uname"];
    $uaccount = $_POST["uaccount"];
    $upassword = $_POST["upassword"];
    $urole = $_POST["urole"];
    
    $SQL="UPDATE user SET uname='$uname', uaccount='$uaccount', upassword='$upassword', urole='$urole' WHERE uno='$uno'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        // echo "alert('Update Successful');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user_mng.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Update Fail');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url= '>";
    }
?>