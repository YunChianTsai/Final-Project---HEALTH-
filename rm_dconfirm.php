<?php
    session_start();
    $_SESSION["rno"]=$_GET["rno"];
    
    echo("<script>if(confirm('是否確定要刪除這則訊息?')){
        window.location='rm_delete.php'
    }else{
        window.location='rmsg_mng.php'
    };</script>");
?>