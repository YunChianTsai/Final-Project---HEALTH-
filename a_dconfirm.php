<?php
    session_start();
    $_SESSION["uno"]=$_GET["uno"];
    
    echo("<script>if(confirm('是否確定要刪除此管理員?')){
        window.location='a_delete.php'
    }else{
        window.location='admin_mng.php'
    };</script>");
?>