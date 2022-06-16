<?php
    session_start();
    $_SESSION["sname"]=$_GET["sname"];
    
    echo("<script>if(confirm('是否確定要刪除此項運動項目?')){
        window.location='s_delete.php'
    }else{
        window.location='sport_mng.php'
    };</script>");
?>