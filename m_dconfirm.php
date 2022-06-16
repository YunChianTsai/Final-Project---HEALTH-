<?php
    session_start();
    $_SESSION["no"]=$_GET["no"];
    
    echo("<script>if(confirm('是否確定要刪除這則訊息?')){
        window.location='m_delete.php'
    }else{
        window.location='msg_mng.php'
    };</script>");
?>