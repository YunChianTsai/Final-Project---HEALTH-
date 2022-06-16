<?php
    require("DBconnect.php");

    $dtype = $_POST["dtype"];
    $dname = $_POST["dname"];
    $dunit = $_POST["dunit"];
    $dcal = $_POST["dcal"];
    
    $SQL = "SELECT * FROM diettype where dtype='$dtype'";
    $result = mysqli_query($link, $SQL);
    if(mysqli_num_rows($result)>0){
        $SQL="INSERT INTO dietlist (dtype, dname, dunit, dcal) VALUES ('$dtype', '$dname', '$dunit', '$dcal')";
        if(mysqli_query($link, $SQL)){
            echo "<script type='text/javascript'>";
            // echo "alert('Update Successful');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=diet_mng.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Update Fail');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url= '>";
        }
    }else{
        $SQL="INSERT INTO diettype (dtype) VALUES ('$dtype')";
        $result = mysqli_query($link, $SQL);
        $SQL="INSERT INTO dietlist (dtype, dname, dunit, dcal) VALUES ('$dtype', '$dname', '$dunit', '$dcal')";
            if(mysqli_query($link, $SQL)){
                echo "<script type='text/javascript'>";
                // echo "alert('Update Successful');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=diet_mng.php'>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Update Fail');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url= '>";

            }
    }
?>