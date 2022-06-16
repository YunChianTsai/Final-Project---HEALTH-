<?php
$link = @mysqli_connect(
    'localhost',
    'health123',
    'health12345',
    'class');

    // $dbname = "class";
    // if(!mysqli_select_db($link, $dbname)){
    //    die("無法開啟 $dbname 資料庫!<br/>");
    // }else{
    //    echo "資料庫： $dbname 開啟成功!<br/>";
    // }

$SQL = "SELECT * FROM user";

// if($result = mysqli_query($link, $SQL)){
//     echo "<table border='1'>";
//     while($row = mysqli_fetch_assoc($result)){
//         echo "<tr>";
//         echo "<td>".$row["uno"]."</td><td>".$row["uname"]."</td><td>".$row["urole"]."</td><br/>";
//         echo "</tr>";
//     }
//     echo "</table>";
// }

?>