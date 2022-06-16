<!-- <?php
    // session_start();
    // require("DBconnect.php");
    // $uno = $_SESSION['uno'];

    // $SQL = "SELECT * FROM user WHERE uno ='$uno'";
    // $result = mysqli_query($link, $SQL);
    // while($row = mysqli_fetch_array($result)){
    //     $uname = $row['uname'];
    // }
?> -->
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
            margin-top: -180px;
            margin-left: -300px;
            z-index: -1;
        }

    </style>
    <!--<link rel="stylesheet" href="narbar.css">-->
</head>
<body style="background-image:url('img/all.jpg');background-size:cover;">
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
<div class="personal" style="width: 850px;margin-top: -180px;margin-left: -425px;">
    <div style="background-color:#fff;border-radius:20px;">
    <?php
        require("DBconnect.php");
        $urole = "user";
        $SQL="SELECT * FROM user WHERE urole ='$urole'";
        $result=mysqli_query($link,$SQL);
        $data_nums=mysqli_num_rows($result);
        $per=10;
        $pages=ceil($data_nums/$per);
        if(!isset($_GET["page"])){
            $page=1;
        }else{
            $page=intval($_GET["page"]);
        }
        $start=($page-1)*$per;
        $result=mysqli_query($link,$SQL.' LIMIT '.$start.','.$per);
        
        // $result=mysqli_query($link,$sql.'LIMIT'.$start.','.$per);

        echo "<table width='100%' height='100%'>";
        echo "<tr>";
        echo "<td align='center' colspan='7'><font size=6 style='border-radius:20px;color: #f0fff0;background-color:#8b3a62;'><b>一般使用者列表</b></font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td height='70px' align='center'><h5><b>會員編號</td><td align='center'><h5><b>姓名</td><td align='center'><h5><b>帳號</td><td align='center'><h5><b>密碼</td><td align='center'><h5><b>角色</td><td align='center' colspan='2'><h5><b>(共 $data_nums 筆)</td></h5>";
        echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td align='center'>"."NO.".$row["uno"]."</td><td align='center'>".$row["uname"]."</td><td align='center'>".$row["uaccount"]."</td><td align='center'>".$row["upassword"]."</td><td align='center'>".$row["urole"]."</td><td align='center'><a href='u_dconfirm.php?uno=".$row["uno"]."' style='text-decoration:none;color:#000;'><span class='fa fa-trash' style='font-size: 1.2em'></span></a></td><td align='center'><a href='u_update.php?uno=".$row["uno"]."' style='text-decoration:none;color:#000;'><span class='fa fa-pencil' style='font-size: 1.2em'></span></a></td>";
                echo "</tr>";
            }
        echo "</table>";
    ?>
        <div style="height:70px;margin-top: 0px;margin-left: 330px;">
        <?php
            echo "<br/><a href=?page=1 style='text-decoration:none'>首頁</a>&nbsp&nbsp";
            echo "第&nbsp";
            for($i=1; $i<=$pages; $i++){
                if($page-3 < $i && $i < $page+3){
                    echo "&nbsp&nbsp<a href=?page=".$i." style='text-decoration:none'>".$i."</a>&nbsp&nbsp";
                }
            }
            echo "&nbsp頁&nbsp&nbsp<a href=?page=".$pages." style='text-decoration:none'>末頁</a><br/><br/>";
        ?>
        </div>
    </div>
</div>
</body>
</html>
