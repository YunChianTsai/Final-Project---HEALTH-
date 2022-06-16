<?php
    session_start();
    require("DBconnect.php");
    $uno = $_SESSION['uno'];

    $SQL = "SELECT * FROM user WHERE uno ='$uno'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        $uname = $row['uname'];
        $uaccount = $row['uaccount'];
    }
    $SQL = "SELECT * FROM personal WHERE uno ='$uno' AND uname ='$uname'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        // if($row['height'] == 0){
        //     $height = "尚未建立基本資料!";
        // }else{
        //     $height = $row['height'];
        // }
        // if($row['weight'] == 0){
        //     $weight = "尚未建立基本資料!";
        // }else{
        //     $weight = $row['weight'];
        // }
        $height = $row['height'];
        $weight = $row['weight'];
        $sex = $row['sex'];
        $age = $row['age'];
        $activity = $row['activity'];
        $g_weight = $row['g_weight'];
    }
    if($weight != 0 && $g_weight != 0){
        if(($weight - $g_weight) > 0){
            $goal = "距離目標體重&nbsp&nbsp&nbsp&nbsp還需減少&nbsp".($weight - $g_weight)."&nbsp公斤";
        }else{
            $goal = "距離目標體重&nbsp&nbsp&nbsp&nbsp還需增加&nbsp".($g_weight - $weight)."&nbsp公斤";
        }
    }elseif($weight != 0 && $g_weight == 0){
        $goal = "距離目標體重&nbsp&nbsp&nbsp&nbsp尚未設定目標體重!";
    }else{
        $goal = "距離目標體重&nbsp&nbsp&nbsp&nbsp尚未建立基本資料!";
    }
    if($height != 0  && $weight != 0){
        $bmi = round((($weight * 100)/$height)/($height/100),2);
    }else{
        $bmi = '尚未建立基本資料';
    }
    if($sex == 1 && $height != 0 && $weight != 0 && $activity !=0){
        $bmr= round(((10 * $weight) + (6.25 * $height) - (5 * $age) + 5),2).' kcal';
    }elseif($sex == 2 && $height != 0 && $weight != 0 && $activity !=0){
        $bmr= round(((10 * $weight) + (6.25 * $height) - (5 * $age) + (-161)),2).' kcal';
    }else{
        $bmr = '尚未建立基本資料';
    }
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
            z-index:50;
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
        }
        .footer{
            position:absolute;
            bottom: -550px;
            width: 100%;
            height: 150px;
        }
        .edit{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -57px;
            margin-left: 350px;
        }
        .coverflow{
        width: 700px;
        height: 490px;
        position: absolute;
        top:50%;
        left:50%;
        margin-top: 100px;
        margin-left: -350px;
    }
    .coverflow>a{
        display: block;
        position: absolute;
        top:0;
        left:0;
        opacity: 0;
        filter: alpha(opacity=0);
        /*當圖片數量增加，影片長度需更改，變為5s圖片數量*/
        -webkit-animation: silder 15s linear infinite;
                animation: silder 15s linear infinite;
    }
    .coverflow>a>img{
        max-width: 100%;
    }

/*動畫關鍵影格*/
    @-webkit-keyframes silder {
        3% {
            opacity: 1;
            filter: alpha(opacity=100);
        }
        27% {
            opacity: 1;
            filter: alpha(opacity=100);
        }
        30% {
            opacity: 0;
            filter: alpha(opacity=0);
        }
    }
    @keyframes silder {
        3% {
            opacity: 1;
            filter: alpha(opacity=100);
        }
        27% {
            opacity: 1;
            filter: alpha(opacity=100);
        }
        30% {
            opacity: 0;
            filter: alpha(opacity=0);
        }
    }

/*每個圖片各延遲5秒*/
    .coverflow>a:nth-child(3) {
        -webkit-animation-delay: 10s;
                animation-delay: 10s;

    }
    .coverflow>a:nth-child(2) {
        -webkit-animation-delay: 5s;
            animation-delay: 5s;
    }
    .coverflow>a:nth-child(1) {
        -webkit-animation-delay: 0s;
            animation-delay: 0s;    
    }
/*滑入時停止播放*/
    .coverflow:hover>a{
    -webkit-animation-play-state: paused;
            animation-play-state: paused;
}
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/usermain.jpg');background-size:cover;">
<header class="main-header">
    <div class="container" style="background-color:#f5fffa;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="#" class="logo">
            <img src="img/heart.jpg" width='50' height='50'>
        </a>
        <ul class="nav">
            <li><a href='#'><b>我的手帳<span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='sport_sche.php'>運動計畫</br></a>
                    <a href='diet_sche.php'>飲食計畫</br></a>
                </nav>
            </li>
            <li><a href='#'><b>BODY計算器<span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='BMI_login.php'>BMI計算器</br></a>
                    <a href='BMRTDEE_login.php'>BMR/TDEE計算器</br></a>
                </nav>
            </li>
        </ul>
        <nav class="icon-nav">
            <a href='#' data-bs-toggle="modal" data-bs-target="#loginModal"><span class="fa fa-comment" style="font-size: 1.6em"></sapn></a>
            <a href='psndata.php'><span class="fa fa-user" style="font-size: 1.6em"></span></a>
            <a href='main.php'><span class="fa-solid fa-right-from-bracket" style="font-size: 1.6em"></span></a>
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
                    <form action="usermain.php" method="post" enctype="multipart/form-data">
                        <div class="form-title" style="margin:1px 5px 1px 5px">
                            <h6><b>聯絡我們</b></h6>
                        </div>
                        <div class="form-text" style="color:#000000;margin:1px 5px 8px 5px">
                            <h6>謝謝您的聯絡，請留下要諮詢的訊息，我們會盡速進行回覆。</h6>
                        </div>
                        <div class="form-group1" style="margin:3px 5px 12px 5px">
                            <input type="email" name="mail" value="<?php echo $uaccount; ?>" autocomplete="off" class="account form-control" placeholder="電子信箱" required>
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
<div class="personal" style="width: 800px;margin-top: -165px;margin-left: -400px;">
<div class="edit" style="width:30px;">
    <a href='#' data-bs-toggle="modal" data-bs-target="#psnModal" style="color:#f5f5f5"><span class="fa fa-pencil-square" style="font-size: 2.2em"></span></a>
    <div class="modal fade" id="psnModal">
        <!--出現對話視窗-->
        <div class="modal-dialog">
            <!--內容-->
            <div class="modal-content" style="width: 800px;height: 400px;margin-left: -100px;">
                <!-- Body -->
                <div class="modal-body" >
                    <!-- 登入表單 -->
                    <form action="g_weightconfirm.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;">
                    <table style="width:100%;height:100%;">
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h2>請輸入你的目標體重</h2></td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="g_weight" min="0" autocomplete="on" value="<?php echo $g_weight;$_SESSION['uno']=$uno;?>" style="width: 50%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="60px">
                            <td colspan="4" align="center">
                            <input type="submit" name="" value="儲存" style="width:50%;height: 30%;background-color:#000;border:none;color:#ffffff;"/></td>
                        </tr>    
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<div>
<table style="width: 100%;">
        <tr height="30px">
            <td colspan="4" align="center"><font size="5" color="#36648b"><h2><b><?php echo "Hello!".$uname; ?></h2></font></td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="60px" style="border:solid;border-color:#fff;background-color:#36648b;color:#f5f5f5;">
                <font size="5">
                    <?php echo $goal;?>
                </font>
            </td>
        </tr>
        <tr>
            <td align="center" height="60px" width="180px" style="border:solid;border-color:#fff;background-color:#4f94cd;color:#f5f5f5;"><h4><b>身高</h4></td>
            <td align="center" height="60px" width="220px" style="border:solid;border-color:#fff;background-color:#f5f5f5;">
                <font size="5" color="#36648b">
                    <?php if($height != 0){echo $height."公分&nbsp&nbsp";}else{echo "尚未建立身高";}?>
                </font>
                <!-- <button id="checkeye" class="fa fa-eye" onclick="click()" aria-hidden="true"></button> -->
            </td>
            <td align="center" height="60px" width="180px" style="border:solid;border-color:#fff;background-color:#4f94cd;color:#f5f5f5;"><h4><b>體重</h4></td>
            <td align="center" height="60px" width="220px" style="border:solid;border-color:#fff;background-color:#f5f5f5;">
                <font size="5" color="#36648b">
                    <?php if($weight != 0){echo $weight."公斤&nbsp&nbsp";}else{echo "尚未建立體重";}?>
                </font>
                <!-- <i id="checkeye" class="fa fa-eye" onclick="click()" aria-hidden="true"></i> -->
            </td>
        </tr>
        <tr>
            <td align="center" height="60px" width="180px" style="border:solid;border-color:#fff;background-color:#4f94cd;color:#f5f5f5;"><h4><b>BMI</br>(身體質量指數)</h4></td>
            <td align="center" height="60px" width="220px" style="border:solid;border-color:#fff;background-color:#f5f5f5;">
                <font size="5" color="#36648b">
                    <?php echo $bmi;?>
                </font>
            </td>
            <td align="center" height="60px" width="180px" style="border:solid;border-color:#fff;background-color:#4f94cd;color:#f5f5f5;"><h4><b>BMR</br>(基礎代謝率)</h4></td>
            <td align="center" height="60px" width="220px" style="border:solid;border-color:#fff;background-color:#f5f5f5;">
                <font size="5" color="#36648b">
                    <?php echo $bmr;?>
                </font>
            </td>
        </tr>
    </table>
</div>
</div>
<div class="coverflow">
    <a href="#"><img src="img/bmi.jpg"></a>
    <a href="#"><img src="img/shape.jpg"></a>
    <a href="#"><img src="img/TDEE.jpg"></a>
</div>
<footer class="footer" style="text-align:center;line-height:150px;background-color:#F5FFFA;"><font size="5" color="#003e3e">KEEP HEALTH</font></footer>
</body>
</html>