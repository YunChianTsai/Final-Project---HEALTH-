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
    $SQL = "SELECT * FROM personal WHERE uno ='$uno' AND uname ='$uname'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        if($row['height'] == 0){
            $height = "尚未輸入身高";
        }else{
            $height = $row['height']."公分";
        }
        if($row['weight'] == 0){
            $weight = "尚未輸入體重";
        }else{
            $weight = $row['weight']."公斤";
        }        
        $sex = $row['sex'];
        $birthday = $row['birthday'];
        if($row['activity'] == 0){
            $activity = "尚未選擇日常運動等級";
        }elseif($row['activity'] == 1.2){
            $activity = "身體活動趨於靜態(幾乎不運動)";
        }elseif($row['activity'] == 1.375){
            $activity = "身體活動程度較低(每週運動1~3天)";
        }elseif($row['activity'] == 1.55){
            $activity = "身體活動程度正常(每週運動3~5天)";
        }elseif($row['activity'] == 1.72){
            $activity = "身體活動程度較高(每週運動6~7天)";
        }else{
            $activity = "身體活動程度激烈(長時間運動或體力勞動工作)";
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
            margin-top: -150px;
            margin-left: -300px;
        }
        .edit{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -140px;
            margin-left: 350px;
        }
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/psn.jpg');background-size:cover;">
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
            <a href='#'><span class="fa fa-user" style="font-size: 1.6em"></span></a>
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
                    <form action="psndata.php" method="post" enctype="multipart/form-data">
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
             
<div class="personal" style="width: 800px;margin-top: -120px;margin-left: -400px;background-color:#fff;">
<div class="edit" style="width:30px;">
    <a href='#' data-bs-toggle="modal" data-bs-target="#psnModal" style="color:#000"><span class="fa fa-pencil" style="font-size: 1.6em"></span></a>
    <div class="modal fade" id="psnModal">
        <!--出現對話視窗-->
        <div class="modal-dialog">
            <!--內容-->
            <div class="modal-content" style="width: 800px;height: 400px;margin-left: -100px;">
                <!-- Body -->
                <div class="modal-body" >
                    <!-- 登入表單 -->
                    <form action="psndataconfirm.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;">
                    <table style="width:100%;height:100%;">
                        <tr height="60px">
                            <td colspan="4" align="center"><font size="5" color="#4f4f4f"><b>編輯基本資料</b></font></td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" width="120px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">姓名</td>
                            <td align="center" height="60px" width="300px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="uname" autocomplete="off" value="<?php echo $uname;?>" style="width: 50%;height: 70%";/>
                            </td>
                            <td align="center" height="60px" width="120px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">會員編號</td>
                            <td align="center" height="60px" width="300px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <font size="3" color="#000000">NO.<?php echo $uno;?></font>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">性別</td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="radio" name="sex" value="1" <?php if($sex == 1) echo "checked=cheecked;"?>/><font size=5>&nbsp<span class="fa fa-male">&nbsp</span>男</font>
                                <input type="radio" name="sex" value="2" <?php if($sex == 2) echo "checked=cheecked;"?>/><font size=5>&nbsp<span class="fa fa-female">&nbsp</span>女</font>                            
                            </td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">生日</td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="date" name="birthday" value="<?php echo $birthday;?>" style="width: 50%;height: 70%";/>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">身高</td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="height" min="0" autocomplete="on" value="<?php echo $height;?>" style="width: 50%;height: 70%"; required/>
                            </td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">體重</td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="weight" min="0" autocomplete="on" value="<?php echo $weight;?>" style="width: 50%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;">日常活動等級</td>
                            <td colspan="3" align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <select name="activity" autocomplete="on" value="<?php echo $activity;?>" style="width: 80%; height: 50%" required>
                                    <option value="0">&nbsp&nbsp&nbsp請選擇</option>
                                    <option value="1.2">&nbsp&nbsp&nbsp身體活動趨於靜態(幾乎不運動)</option>
                                    <option value="1.375">&nbsp&nbsp&nbsp身體活動程度較低(每週運動1~3天)</option>
                                    <option value="1.55">&nbsp&nbsp&nbsp身體活動程度正常(每週運動3~5天)</option>
                                    <option value="1.72">&nbsp&nbsp&nbsp身體活動程度較高(每週運動6~7天)</option>
                                    <option value="1.9">&nbsp&nbsp&nbsp身體活動程度激烈(長時間運動或體力勞動工作)</option>
                                </select>                            
                        </td>
                        </tr>
                        <tr height="60px">
                            <td colspan="4" align="center">
                            <input type="submit" name="" value="儲存" style="width:30%;height: 50%;background-color:#4f4f4f;border:none;color:#f5f5f5;"/></td>
                        </tr>    
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
    <table style="width: 100%;height: 300px;">
        <tr height="30px">
            <td colspan="4" align="center"><font size="5" color="#4f4f4f"><h2><b>會員基本資料</h2></font></td>
        </tr>
        <tr>
            <td align="center" height="60px" width="150px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h4><b>姓名</h4></td>
            <td align="center" height="60px" width="280px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969"><?php echo $uname;?>
            </td>
            <td align="center" height="60px" width="150px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h5><b>會員編號
            <td align="center" height="60px" width="280px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">NO.<?php echo $uno;?></font>
            </td>
        </tr>
        <tr>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h4><b>性別</h4></td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">
                    <?php
                        if($sex == 1){
                            echo "男性";
                        }elseif($sex == 2){
                            echo "女性";
                        }else{
                            echo "尚未選擇性別";
                        }
                    ?>
                </font>                    
            </td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h4><b>生日</h4></td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">
                    <?php
                        if($birthday == ""){
                            echo "尚未選擇生日";
                        }else{
                            echo $birthday;
                        }
                    ?>
                </font>
            </td>
        </tr>
        <tr>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h4><b>身高</h4></td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">
                    <?php echo $height;?>
                </font>
            </td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h4><b>體重</h4></td>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">
                    <?php echo $weight;?>
                </font>
            </td>
        </tr>
        <tr>
            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#8b8682;color:#f5f5f5;"><h5><b>日常活動等級</h5></td>
            <td colspan="3" align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                <font size="5" color="#696969">
                    <?php echo $activity;?>
                </font>
            </td>
        </tr>
    </table>
    </div>
</div>
</body>
</html>