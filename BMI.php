<?php
require("DBconnect.php");
if(isset($_POST['mail']) && isset($_POST['text'])){
    $mail = $_POST["mail"];
    $text = $_POST["text"];
    $SQL = "INSERT INTO message (mail, text) VALUES ('$mail', '$text')";
    $result = mysqli_query($link, $SQL);
}
?>
<!DOCTYPE html>
<html lang="zh-hant"> <!-- lang指定語言 -->
<head>
    <title>Health手帳</title>
    <meta charset="UTF-8">
    <meta name="description" content="首頁">
    <!-- Boostrap 導入程式 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="BMIscript.js" defer></script>
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
        .title{
            position:absolute;
            top: 110px;
            left: 535px;
            z-index: -1;
        }
        .bmi_intro{
            position:absolute;
            top: 50%;
            left: 50%;
            margin-top: -130px;
            margin-left: -400px;
            z-index: -1;
        }
        .bmi_table{
            position:absolute;
            top: 50%;
            left: 50%;
            margin-top: 10px;
            margin-left: -300px;
            z-index: -1;
        }
        .modal-dialog{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -180px;
            margin-left: -300px;
        }
        .footer{
            position:absolute;
            bottom: -350px;
            width: 100%;
            height: 150px;
        }
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/bmibmr.jpg');background-size:cover;">
<header class="main-header">
    <div class="container" style="background-color:#f5fffa;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="main.php" class="logo">
            <img src="img/heart.jpg" width='50' height='50'>
        </a>
        <ul class="nav">
            <li><a href='#'><b>我的手帳</b><span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='login.php'>運動計畫</br></a>
                    <a href='login.php'>飲食計畫</br></a>
                </nav>
            </li>
            <li><a href='#'><b>BODY計算器</b><span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='BMI.php'>BMI計算器</br></a>
                    <a href='BMRTDEE.php'>BMR/TDEE計算器</br></a>
                </nav>
            </li>
        </ul>
        <nav class="icon-nav">
            <a href='#' data-bs-toggle="modal" data-bs-target="#loginModal"><span class="fa fa-comment" style="font-size: 1.6em"></sapn></a>
            <a href='login.php'><span class="fa fa-user" style="font-size: 1.6em"></span></a>
            <!--<a href='#'><span class="fa-solid fa-right-from-bracket" style="font-size: 1.6em"></span></a>-->
        </nav>
    </div>
    <div class="modal fade" id="loginModal">
        <!--出現對話視窗-->
        <div class="modal-dialog">
            <!--內容-->
            <div class="modal-content" style="width:600px;">
                <!-- Body -->
                <div class="modal-body" >
                    <!-- 登入表單 -->
                    <form action="BMI.php" method="post" enctype="multipart/form-data">
                        <div class="form-title" style="margin:1px 5px 1px 5px">
                            <h6><b>聯絡我們</b></h6>
                        </div>
                        <div class="form-text" style="color:#000000;margin:1px 5px 8px 5px">
                            <h6>謝謝您的聯絡，請留下要諮詢的訊息，我們會盡速進行回覆。</h6>
                        </div>
                        <div class="form-group1" style="margin:3px 5px 12px 5px">
                            <input type="email" name="mail" autocomplete="off" class="account form-control" placeholder="電子信箱" required>
                        </div>
                        <div class="form-group2" style="border:none;margin:12px 5px 0px 5px">
                            <textarea type="text" maxlength="250" name="text" autocomplete="off" style="resize:none;height:100px;" class="text form-control" placeholder="請輸入您的訊息(最多可輸入250位文字)" required></textarea>
                        </div>
                        <div class="modal-footer" style="border:none;margin:0px 5px -15px 5px">
                            <!-- 送出按鈕 -->
                            <input type="submit" value="Sent!" class="btn btn-info" style="width:100px;border:none;background-color:#000;color:#fff;margin-right:-12px;"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<font size=6 style="border-radius:20px;width:200px;text-align:center;color: #f0fff0;background-color:#003e3e;" class="title"><b>BMI計算器</b></font>
<div class="bmi">
    <div class="bmi_intro" style="width:800px;height:120px;background-color:#f0fff0;color:#003e3e;padding:25px;">
            <font>身體質量指數（Body Mass Index（BMI））又稱凱特萊指數（Quetelet index），是由一個人的體重和身高計算出的一個數值。
            世界衛生組織建議以身體質量指數來衡量肥胖程度，其計算公式是以體重（公斤）除以身高（公尺）的平方。</font>
    </div>
    <div class="bmi_table" style="background-color:#fff;border-radius: 20px;">
        <table width="600px" height="320px">
            <tr height="80px" style="margin:10px;">
                <td colspan="2" align="center">
                    <font>身高(公分)</br></font>
                    <input type="text" id="height" autocomplete="off" placeholder="    請輸入身高" style="width: 85%;height: 50%;"; required/>
                    <span id="height_error"></span>
                </td>
            </tr>
            <tr height="80px">
                <td colspan="2" align="center">
                    <font>體重(公斤)</br></font>
                    <input type="text" id="weight" autocomplete="off" placeholder="    請輸入體重" style="width:85%;height: 50%;" required/>
                    <span id="weight_error"></span>
                </td>
            </tr>
            <tr height="80px">
                <td align="center">
                    <input type="button" onclick="calculate()" name="" value="立即計算" style="width: 25%;height: 50%;margin: 3px;background-color: #003e3e;border: none;color: #ffffff;"/>
                    <input type="button" onclick="cleanstring()" name="" value="全部清除" style="width: 25%;height: 50%;margin: 3px;background-color: #005757;border: none;color: #ffffff;"/>
                </td>
            </tr>
            <tr height="80px">
                <td align="center" id="output"></td>
            </tr>
        </table>
    </div>
</div>
<footer class="footer" style="text-align:center;line-height:150px;background-color:#F5FFFA;"><font size="5" color="#003e3e">KEEP HEALTH</font></footer>
</body>
</html>