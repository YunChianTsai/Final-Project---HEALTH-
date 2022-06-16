<?php
    session_start();
    $_SESSION["uno"]=$_GET["uno"];
    
    echo("<script>if(confirm('是否確定要刪除此使用者?')){
        window.location='u_delete.php'
    }else{
        window.location='user_mng.php'
    };</script>");
?>