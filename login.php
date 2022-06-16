<?PHP
ob_start();
session_start();
require("DBconnect.php");
// echo "<meta http-equiv='Refresh'>"
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
        .table{
            position:absolute;
            top:50%;
            left:50%;
            width: 600px;
            margin-top: -130px;
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
    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/log.jpg');background-size:cover;">
<header class="main-header">
    <div class="container" style="background-color:#F5FFFA;border-bottom-style:solid;border-color:#e8e8e8">
        <a href="main.php" class="logo">
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
            <!--<a href='main.php'><span class="fa-solid fa-right-from-bracket" style="font-size: 1.6em"></span></a>-->
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
                    <form action="login.php" method="post" enctype="multipart/form-data">
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

<div class="table" style="background-color:#fff">
    <form action="" method="post" enctype="multipart/form-data">
    <table width="600px" height="300px" style="border-width:1px;border-style:solid;border-color:#a9a9a9;">
        <tr height="60px">
            <td align="center" style="background-color:#f5f5f5"><a href='logup.php' style="text-decoration:none"><font size="3" color="#000000"><b>註冊會員</b></font></a></td>
            <td align="center"><font size="3" color="#000000"><b>會員登入</b></font></td>
        </tr>
        <tr>
            <td colspan="2" align="center" height="60px">
            <input type="text" name="uaccount" autocomplete="off" placeholder="    電子信箱" style="width: 85%;height: 70%"; required/>
            </td>
        </tr>
        <tr height="60px">
            <td colspan="2" align="center">
            <input type="password" name="upassword" autocomplete="off" placeholder="    密碼" style="width:85%;height: 70%;" required/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input type="submit" name="" value="歡迎回來" style="width:85%;height: 70%;background-color:#1e90ff;border:none;color:#ffffff;"/></td>
        </tr>    
        <tr>
            <td colspan="2" align="center">
            <?php
                if(isset($_POST["uaccount"])){     //isset：有設定變數才執行  
                    if($_POST["uaccount"]!=null){     
                        $uaccount=$_POST["uaccount"];
                        $upassword=$_POST["upassword"];

                        $SQL = "SELECT * FROM user WHERE uaccount ='$uaccount' AND upassword ='$upassword'";
                        $result = mysqli_query($link, $SQL);
                        while($row=mysqli_fetch_array($result)){
                            $urole = $row['urole'];
                            $uno = $row['uno'];
                        }
                        if(mysqli_num_rows($result)==1){
                            $_SESSION["login"]="Yes";
                            if($urole == 'admin'){
                                $_SESSION['uno'] = $uno;
                                header('Location: adminmain.php');
                            }else{
                                $_SESSION['uno'] = $uno;
                                header('Location: usermain.php');
                            }
                        }else{
                            echo "Your Account Or Password Is Error";
                        }
                    }else{
                        echo "Please Enter Your Account & Password";
                    }
                }else{
                    echo "Welcome!  ";
                    echo "Please Enter Your Account & Password";   
                }
                //如果出現header already sent
                ob_flush();
                ?>            
            </td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>
<!-- <script type="text/javascript">
function reset(){
    document.getElementById('mail').Value='';
    document.getElementById('text').Value='';
}
</script> -->