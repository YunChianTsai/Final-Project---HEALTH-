<?php
    session_start();
    $_SESSION["dname"]=$_GET["dname"];
    
    echo("<script>if(confirm('是否確定要刪除此項食物項目?')){
        window.location='d_delete.php'
    }else{
        window.location='diet_mng.php'
    };</script>");
?>