<?php
    session_start();
    require("DBconnect.php");
    $uno = $_SESSION['uno'];

    $uname = $_POST["uname"];
    $sex = $_POST["sex"];
    $birthday = $_POST["birthday"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $activity = $_POST["activity"];
    function birthday($birthday){
        list($year,$month,$day) = explode("-",$birthday);
        $age = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = date('d') - $day;
        if($day_diff < 0 || $month_diff < 0)
            $age--;
        return $age;
    }
    $age = birthday($birthday);
    $SQL="UPDATE personal SET uname='$uname', sex='$sex', birthday='$birthday', height='$height', weight='$weight',activity='$activity',age='$age' WHERE uno='$uno'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        // echo "alert('Update Successful');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=psndata.php'>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Update Fail');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url= '>";
    }
?>