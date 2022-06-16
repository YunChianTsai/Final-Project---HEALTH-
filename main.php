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
    <link href="weather.css" rel="stylesheet">
    <script src="all.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="首頁">
    <!-- Boostrap 導入程式 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
            /* margin: -0.5em; */
            z-index: 80;
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
        .time{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -185px;
            margin-left: -350px;
        }        
        .weather{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -35px;
            margin-bottom: -50px;
            margin-left: -250px;
        }
        .footer{
            position:absolute;
            bottom: -300px;
            width: 100%;
            height: 150px;
        }
    </style>
</head>
<body style="background-image:url('img/main_1.jpg');background-size:cover;" onload="current_time()">
<header class="main-header">
    <div class="container" style="background-color:#F5FFFA;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="#" class="logo">
            <img src="img/heart.jpg" width='50' height='50'>
        </a>
        <ul class="nav">
            <li><a href='#'><b>我的手帳<span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='login.php'>運動計畫</br></a>
                    <a href='login.php'>飲食計畫</br></a>
                </nav>
            </li>
            <li><a href='#'><b>BODY計算器<span class="fa fa-angle-down"></span></a>
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
                    <form action="main.php" method="post" enctype="multipart/form-data">
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
<div class="time" style="width:700px;border-radius:5%;">
    <main style="background-color:#033a79;">
        <div id="date"><span id="onlydate"></span>&nbsp<span id="onlyday"></span></div>
        <div id="time"><span id="onlytime"></span></div>
    </main>
</div>
<!-- <font><span id="hru"></span>今天是&nbsp<span id="onlydate"></span>&nbsp<span id="onlyday"></span>&nbsp現在時間：<span id="onlytime"></span></font> -->
<div class="weather" style="border-radius:5%;width:500px;height:310px;background-color:#F5FFFA">
    <main id="left" style="border-radius:5%;">
        <div id="location">City UT</div>
        <div id="station">Current station</div>
        <div id="temperature">00</div>
        <div id="h_l_temperature" width="50%" >00</div>
        <div id="phenmn"></div>
    </main>
</div>
<footer class="footer" style="text-align:center;line-height:150px;background-color:#F5FFFA;"><font size="5" color="#003e3e">KEEP HEALTH</font></footer>
</body>
</html>
<script>
    function current_time(){
        var date = new Date();
        const onlyDate = (current_datetime)=>{
            let formatted_date = current_datetime.getFullYear() + " 年 " + (current_datetime.getMonth()+1) + " 月 " + current_datetime.getDate() + " 日 ";
            return formatted_date;
        }
        var seconds = date.getSeconds();
        if(seconds<10){seconds="0"+seconds;}
        var minutes = date.getMinutes();
        if(minutes<10){minutes="0"+minutes;}
        var hours = date.getHours();
        if(hours<10){hours="0"+hours;}
        const onlyTime = (current_datetime)=>{
            let formatted_date = hours + ":" + minutes + ":" + seconds;
            return formatted_date;
        }
        var weekArray=new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
        var week = weekArray[date.getDay()];
        document.getElementById('onlydate').innerHTML = onlyDate(date)
        document.getElementById('onlytime').innerHTML = onlyTime(date)
        document.getElementById('onlyday').innerHTML = week
        setTimeout('current_time()',1000); //每秒呼叫一次功能: current_time()
    }
</script>