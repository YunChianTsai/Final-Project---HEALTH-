<?php
session_start();
require("DBconnect.php");
$no=$_GET["no"];
$SQL="SELECT * FROM message WHERE no='$no'";
if($result=mysqli_query($link, $SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $mail=$row['mail'];
        $text=$row['text'];
    }
}
?>
<!DOCTYPE html>
<html lang="zh-hant"> <!-- lang指定語言 -->
<head>
    <title>Health手帳</title>
    <meta charset="UTF-8">
    <meta name="description" content="首頁">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- <script src="BTDscript.js" defer></script> -->
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap');
        @import url('https://use.fontawesome.com/releases/v6.1.1/css/all.css');
        *{
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .main-header .container{
            display: flex;
            position: fixed;
            align-items: center;
            padding: 20px;
            max-width: 100%;
            left: 0;
            right: 0;
        }
        .main-header .logo{
            width: 100px;
        }
        .main-header .logo img{
            width: 100%;
            vertical-align: middle;
        }
        .main-header .nav{
            margin: auto;
            display: flex;
        }
        .main-header .nav a{
            color: #000;
            text-decoration: none;
            padding: 5px 5em;
            position: relative;
        }
        .main-header .nav li{
            transform: translateY(0px);
            transition: .3s;
        }
        .main-header .nav li:hover{
            transform: translateY(-10px);
        }
        .main-header .nav li:after{
            content: '';
            position: absolute;
            left: 50%;
            right: 50%;
            bottom: -5px;
            height: 0;
            border-bottom: 1px solid #000;
            transition: .3s;
        }
        .main-header .nav li:hover:after{
            left: 0;
            right: 0;
        }
        .main-header .nav .second-nav{
            display: none;
            position: absolute;
            box-shadow: 0px 6px 8px 0px rgba(0,0,0,0.2);
            padding: 16px 8px;
            text-decoration: none;
            color: #000;
        }
        .main-header .nav li:hover .second-nav{
            display: block;
        }
        .main-header .nav .second-nav a:hover{
            color: #a9a9a9;
        }
        .main-header .icon-nav a{
            text-decoration: none;
            padding: 5px 0.5em;
            color: #000;
        }
        .main-header .icon-nav a:hover{
            color: #a9a9a9;
        }
        .modal-dialog{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -180px;
            margin-left: -300px;
        }
        .personal{
            position:absolute;
            top:50%;
            left:50%;
            z-index: -1;
        }

    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/message.jpg');background-size:cover;">
<header class="main-header">
    <div class="container" style="background-color:#fff0f5;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="adminmain.php" class="logo">
            <img src="img/heart.jpg" width='50' height='50'>
        </a>
        <ul class="nav">
            <li><a href='#'><b>帳戶資料管理</b><span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='admin_mng.php'>系統管理員</br></a>
                    <a href='user_mng.php'>一般使用者</br></a>
                </nav>
            </li>
            <li><a href='#'><b>資料庫管理</b><span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='sport_mng.php'>運動清單管理</br></a>
                    <a href='diet_mng.php'>飲食菜單管理</br></a>
                </nav>
            </li>
        </ul>
        <nav class="icon-nav">
            <a href='msg_mng.php'><span class="fa fa-commenting" style="font-size: 1.6em"></sapn></a>
            <a href='main.php'><span class="fa-solid fa-right-from-bracket" style="font-size: 1.6em"></span></a>
        </nav>
    </div>
</header>
<!-- data-bs-toggle="psn" data-bs-target="#psnModal" -->
<div class="personal" style="width: 720px;margin-top: -180px;margin-left: -360px;padding:0px 0px 50px 0px;">
    <form action="m_rconfirm.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;">
        <table style="width:100%;height:100%;background-color:#fff;border-radius:20px;">
            <tr height="60px">
                <td colspan="4" align="center"><font size="5" color="#8b4789"><b>回覆...</b></font></td>
            </tr>
            <tr>
                <td align="center" height="60px" width='150px' style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b668b;color:#f5f5f5;"><b>訊息編號</b></td>
                <td height="60px" width='600px' style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                    <font size="4" color="#000000">&nbsp&nbspNO.<?php echo $no; $_SESSION['no']=$no;?></font>
                </td>
            </tr>
            <tr>
                <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b668b;color:#f5f5f5;"><b>電子信箱</b></td>
                <td height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                    <font size="4" color="#000000">&nbsp&nbsp<?php echo $mail; $_SESSION['mail']=$mail;?></font>
                </td>
            </tr>
            <tr>
                <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b668b;color:#f5f5f5;"><b>訊息內容</b></td>
                <td height="60px" style="word-break:break-all;word-wrap:break-word;border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                    <font size="4" color="#000000"><?php echo $text; $_SESSION['text']=$text;?></font>
                </td>
            </tr>
            <tr>
                <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b668b;color:#f5f5f5;"><b>回覆</b></td>
                <td height="200px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                    <textarea type="text" maxlength="500" name="reply" autocomplete="off" style="resize:none;height:80%;width:95%" class="text form-control" placeholder="請輸入回覆內容" required></textarea>
                </td>
            </tr>
            <tr height="60px">
                <td colspan="4" align="center" >
                <input type="submit" name="" value="sent!" style="width:30%;height: 50%;background-color:#8b4789;border:none;color:#ffffff;"/></td>
            </tr>    
        </table>
    </form>
</div>
</body>
</html>