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
    if(isset($_POST['mail']) && isset($_POST['text'])){
        $mail = $_POST["mail"];
        $text = $_POST["text"];
        $SQL = "INSERT INTO message (mail, text) VALUES ('$mail', '$text')";
        $result = mysqli_query($link, $SQL);
    }
    $SQL = "SELECT * FROM personal WHERE uno ='$uno'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        $sex = $row['sex'];
        $weight = $row['weight'];
        $height = $row['height'];
    }
    $SQL = "SELECT * FROM personal WHERE uno ='$uno'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        $sex = $row['sex'];
        $age = $row['age'];
        $height = $row['height'];
        $weight = $row['weight'];
        $activity = $row['activity'];
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
        .personal{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -180px;
            margin-left: -300px;
            margin-bottom: -50px;
        }
        .personal_1{
            position:absolute;
            top: 22px;
            left: 735px;
        }
        .title{
            position:absolute;
            top: 20px;
            left: 20px;
            z-index: 20;
        }
        .schedule{
            position:absolute;
            top: 80px;
            left: 8px;
            z-index: 30;
        }
        .footer{
            position:absolute;
            bottom: -650px;
            width: 100%;
            height: 150px;
        }
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/sport.jpg');background-size:cover;">
<header class="main-header">
    <div class="container" style="background-color:#f5fffa;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="usermain.php" class="logo">
            <img src="img/heart.jpg" width='50' height='50'>
        </a>
        <ul class="nav">
            <li><a href='#'><b>我的手帳</b><span class="fa fa-angle-down"></span></a>
                <nav class="second-nav" style="background:#fff">
                    <a href='sport_sche.php'>運動計畫</br></a>
                    <a href='diet_sche.php'>飲食計畫</br></a>
                </nav>
            </li>
            <li><a href='#'><b>BODY計算器</b><span class="fa fa-angle-down"></span></a>
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
                    <form action="sport_sche.php" method="post" enctype="multipart/form-data">
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
<!-- data-bs-toggle="psn" data-bs-target="#psnModal" -->
             
<div class="personal" style="background-color:#fff;border-radius: 20px;width: 800px;height: 800px;margin-top: -180px;margin-left: -400px;">
    <div class="title">
        <font size="6" color="#36648b" face="圓體"><b><?php echo $uname; ?>的運動計畫</b></font>
    </div>
    <div class="personal_1">
        <a href='choose_s.php' style="color: #104e8b"><span class="fa fa-plus-circle" style="font-size: 2.5em"></span></a>
    </div>
    <div class="schedule" style="border-top:dotted;width:780px;border-top-color:#36648b;">
    <table style="width: 100%;height: 300px;">
    <?php
    echo "<tr>";
    echo "<td height='50px' align='center'><h5><b>運動名稱</td><td align='center'><h5><b>時間</td><td align='center'><h5><b>消耗熱量</td></h5>";
    echo "</tr>";
    if(isset($_POST['sport'])){
        $csport = $_POST['sport'];
    }else{
        $csport = '';
    }
    if($csport!=''){
        $i=0;
        $tkcal=0;
        for($i=0;$i<count($csport);$i++){
            $sport=$csport[$i];
            $SQL = "SELECT * FROM sportlist WHERE sname ='$sport'";
            $result = mysqli_query($link, $SQL);
            $s=array();
            $x=0;
            $y=0;
            while($row = mysqli_fetch_array($result)){
                $s[$x] = $row;
                $t="60";
                echo "<tr>";
                echo "<td align='center'>".$s[$x][$y+1]."</td><td align='center'>".$t." mins"."</td><td align='center'>".$s[$x][$y+2] * $weight." kcal"."</td>";
                echo "</tr>";
                $tkcal = $tkcal + ($s[$x][$y+2] * $weight);
                $total = $tkcal." kcal";
                $x++;
                $y++;
            }
        }
    }else{
        $total= '尚未安排運動計畫!';
    }
    ?>
    <tr style="border-top:dotted;width:780px;border-top-color:#36648b">
        <td colspan='3' align='center'><font>今日運動消耗熱量：</font><?php echo $total; ?></td>
    </tr>
    <?php 
        if($sex == 1 && $height != 0 && $weight != 0 && $activity !=0){
            $tdee= round(((10 * $weight) + (6.25 * $height) - (5 * $age) + 5) * $activity,2).' kcal';
        }elseif($sex == 2 && $height != 0 && $weight != 0 && $activity !=0){
            $tdee= round(((10 * $weight) + (6.25 * $height) - (5 * $age) + (-161)) * $activity,2).' kcal';
        }else{
            $tdee = '尚未完成基本資料填寫';
        }
        ?>
    <!-- <tr>
        <td colspan='3' align='center'><font>你的每日總消耗熱量(TDEE)：</font><?php echo $tdee; ?></td>
    </tr> -->
    </table>
    </div>
</div>
<footer class="footer" style="text-align:center;line-height:150px;background-color:#F5FFFA;"><font size="5" color="#003e3e">KEEP HEALTH</font></footer>
</body>
</html>
