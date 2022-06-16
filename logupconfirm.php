<?php
require("DBconnect.php");   //一定要存在，若無則無法run
//include("DBconnect.php");   //不一定要存在

$uname=$_POST["uname"];
$uaccount=$_POST["uaccount"];
$upassword=$_POST["upassword"];
$upwd=$_POST["upwd"];

$SQL = "SELECT * FROM user where uname='$uname'";
$result = mysqli_query($link, $SQL);

if(mysqli_num_rows($result)>0){
    echo "<script type='text/javascript'>";
    echo "alert('暱稱已被使用!');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
}else{
    $SQL = "SELECT * FROM user where uaccount='$uaccount'";
    $result = mysqli_query($link, $SQL);
    if(mysqli_num_rows($result)>0){
        echo "<script type='text/javascript'>";
        echo "alert('帳號已被使用!');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
    }else{
        $SQL="INSERT INTO user (uname, uaccount, upassword, urole) VALUES ('$uname', '$uaccount', '$upassword', 'user')";
        if($upassword == $upwd AND mysqli_query($link, $SQL)){
            $SQL="SELECT * FROM user WHERE uaccount ='$uaccount' AND upassword ='$upassword'";
            $result = mysqli_query($link, $SQL);
            while($row=mysqli_fetch_array($result)){
                $uno = $row['uno'];
            }
            $SQL="INSERT INTO personal (uno, uname) VALUES ('$uno', '$uname')";
            if(mysqli_query($link, $SQL)){
                echo "<script type='text/javascript'>";
                echo "alert('Logup Successful!');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=login.php'>";
                //header('Location: list.php');
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Logup Failed!');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
            }
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('密碼輸入錯誤!');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
        }
    }
}

// if($uname != $uname_db AND $uaccount != $uaccount_db){
//     if($upassword == $upwd){
//         $SQL="INSERT INTO user (uname, uaccount, upassword, urole) VALUES ('$uname', '$uaccount', '$upassword', 'user')";
//         if(mysqli_query($link, $SQL)){
//             $SQL="SELECT * FROM user WHERE uaccount ='$uaccount' AND upassword ='$upassword'";
//             $result = mysqli_query($link, $SQL);
//             while($row=mysqli_fetch_array($result)){
//                 $uno = $row['uno'];
//             }
//             $SQL="INSERT INTO personal (uno, uname) VALUES ('$uno', '$uname')";
//             if(mysqli_query($link, $SQL)){
//                 echo "<script type='text/javascript'>";
//                 echo "alert('Logup Successful!');";
//                 echo "</script>";
//                 echo "<meta http-equiv='Refresh' content='0; url=login.php'>";
//                 //header('Location: list.php');
//             }else{
//                 echo "<script type='text/javascript'>";
//                 echo "alert('Logup Failed!');";
//                 echo "</script>";
//                 echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
//             }
//         }else{
//             echo "<script type='text/javascript'>";
//             echo "alert('Logup Failed!');";
//             echo "</script>";
//             echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
//             //header('Location: list.php');
//         }
//     }else{
//         echo "<script type='text/javascript'>";
//         echo "alert('Enter Error!');";
//         echo "</script>";
//         echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
//     }
// }elseif($uname == $uname_db AND $uaccount != $uaccount_db){
//     echo "<script type='text/javascript'>";
//     echo "alert('暱稱已被使用!');";
//     echo "</script>";
//     echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
// }elseif($uname != $uname_db AND $uaccount == $uaccount_db){
//     echo "<script type='text/javascript'>";
//     echo "alert('帳號已被使用!');";
//     echo "</script>";
//     echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
// }else{
//     echo "<script type='text/javascript'>";
//     echo "alert('暱稱和帳號已被使用!');";
//     echo "</script>";
//     echo "<meta http-equiv='Refresh' content='0; url=logup.php'>";
// }

//header('Location: list.php')

?>