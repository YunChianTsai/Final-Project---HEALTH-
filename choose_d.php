<?php
    session_start();
    require("DBconnect.php");
    $uno = $_SESSION['uno'];

    $SQL = "SELECT * FROM user WHERE uno ='$uno'";
    $result = mysqli_query($link, $SQL);
    while($row = mysqli_fetch_array($result)){
        $uname = $row['uname'];
    }
    if(isset($_POST['mail']) && isset($_POST['text'])){
        $mail = $_POST["mail"];
        $text = $_POST["text"];
        $SQL = "INSERT INTO message (mail, text) VALUES ('$mail', '$text')";
        $result = mysqli_query($link, $SQL);
    }
    // $SQL = "SELECT * FROM personal WHERE uno ='$uno'";
    // $result = mysqli_query($link, $SQL);
    // while($row = mysqli_fetch_array($result)){
    //     $weight = $row['weight'];
    // }
    // $SQL = "SELECT * FROM personal WHERE uno ='$uno' AND uname ='$uname'";
    // $result = mysqli_query($link, $SQL);
    // while($row = mysqli_fetch_array($result)){
    //     if($row['height'] == 0){
    //         $height = "尚未輸入身高";
    //     }else{
    //         $height = $row['height']."公分";
    //     }
    //     if($row['weight'] == 0){
    //         $weight = "尚未輸入身高";
    //     }else{
    //         $weight = $row['weight']."公斤";
    //     }        
    //     $sex = $row['sex'];
    //     $birthday = $row['birthday'];
    // }
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
 
        /* .modal-content {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
 
        .modal-body {
            overflow-y: scroll;
            position: absolute;
            top: 55px;
            bottom: 65px;
            width: 100%;
        } */
 
        /* .modal-header .close {margin-right: 15px;}
 
        .modal-footer {
            position: absolute;
            width: 100%;
            bottom: 0;
        } */
        .personal{
            position:absolute;
            top:50%;
            left:50%;
            margin-top: -180px;
            margin-left: -300px;
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
            bottom: -2100px;
            width: 100%;
            height: 150px;
        }
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/diet.jpg');background-size:cover;">
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
                    <form action="choose_d.php" method="post" enctype="multipart/form-data">
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
             
<div class="personal" style="background-color:#fff;border-radius: 20px;width: 800px;margin-top: -150px;margin-left: -400px;">
    <form action="diet_sche.php" method="post" enctype="multipart/form-data">
    <?php
        $SQL="SELECT * FROM dietlist";
        $result=mysqli_query($link,$SQL);
        $data_nums=mysqli_num_rows($result);
        // $per=10;
        // $pages=ceil($data_nums/$per);
        // if(!isset($_GET["page"])){
        //     $page=1;
        // }else{
        //     $page=intval($_GET["page"]);
        // }
        // $start=($page-1)*$per;
        $result=mysqli_query($link,$SQL);
        // $result=mysqli_query($link,$SQL.' LIMIT '.$start.','.$per); 
        $i=0;
        echo "<table width='100%' height='100%'>";
        echo "<tr>";
        echo "<td height='50px' align='center'><h5><b>共".$data_nums."筆</td><td align='center'><h5><b>分類</td><td align='center'><h5><b>食物名稱</td><td align='center'><h5><b>單位</td><td align='center'><h5><b>熱量</td></h5>";
        echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
                $dname=$row["dname"];
                echo "<tr>";
                echo "<td align='center'><input name='diet[]' type='checkbox' value='$dname'></td><td align='center'>".$row["dtype"]."</td><td align='center'>".$row["dname"]."</td><td align='center'>".$row["dunit"]."</td><td align='center'>".$row["dcal"].'kcal'."</td>";
                echo "</tr>";
            }
        echo "<tr>";
        echo "<td height='50px' colspan='5' align='center'><input type='submit' value='加入' style='width:28%;background-color:#000;border:none;color:#fff;'/></td>";
        echo "</tr>";
        echo "</table>";
    ?>
    </form>
    <!-- <div style="margin-top: 0px;margin-left: 295px;">
        <?php
            echo "<a href=?page=1 style='text-decoration:none'>首頁</a>&nbsp&nbsp";
            echo "第&nbsp";
            for($i=1; $i<=$pages; $i++){
                if($page-3 < $i && $i < $page+3){
                    echo "&nbsp&nbsp<a href=?page=".$i." style='text-decoration:none'>".$i."</a>&nbsp&nbsp";
                }
            }
            echo "&nbsp頁&nbsp&nbsp<a href=?page=".$pages." style='text-decoration:none'>末頁</a><br/><br/>";
        ?>
    </div> -->
</div>
<footer class="footer" style="text-align:center;line-height:150px;background-color:#F5FFFA;"><font size="5" color="#003e3e">KEEP HEALTH</font></footer>
</body>
</html>
