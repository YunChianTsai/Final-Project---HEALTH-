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
            z-index: 50;
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
            margin-top: -100px;
            margin-left: -300px;
        }
        .personal_1{
            position:absolute;
            top: 6px;
            left: 648px;
        }
        .personal_2{
            z-index: 10;
        }
        .personal_3{
            z-index: 20;
            position:absolute;
            top: 8px;
            left: 200px;
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
<div class="personal" style="width: 720px;margin-top: -180px;margin-left: -360px;background-color:#fff;">
    <div class="personal_1">
    <a href='#' data-bs-toggle="modal" data-bs-target="#psnModal_1" style="color:#000;"><span class="fa fa-plus-circle" style="font-size: 2.2em"></span></a>
        <div class="modal fade" id="psnModal_1">
        <!--出現對話視窗-->
        <div class="modal-dialog">
            <!--內容-->
            <div class="modal-content" style="width: 800px;height: 400px;margin-left: -100px;">
                <!-- Body -->
                <div class="modal-body" >
                    <!-- 登入表單 -->
                    <form action="dconfirm.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;">
                    <table style="width:100%;height:100%;">
                        <tr height="60px">
                            <td colspan="4" align="center"><font size="5" color="#000000"><b>新增飲食項目</b></font></td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" width="100px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#6c7b8b;color:#f5f5f5;"><b>分類</b></td>
                            <td align="center" height="60px" width="300px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="dtype" autocomplete="off" placeholder="" style="width: 85%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" width="100px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#6c7b8b;color:#f5f5f5;"><b>飲食名稱</b></td>
                            <td align="center" height="60px" width="300px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="dname" autocomplete="off" placeholder="" style="width: 85%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#6c7b8b;color:#f5f5f5;"><b>單位</b></td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="text" name="dunit" autocomplete="off" placeholder="" style="width: 85%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="50px">
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#6c7b8b;color:#f5f5f5;"><b>熱量(大卡)</b></td>
                            <td align="center" height="60px" style="border:solid;border-color:#fff;border-radius:20px;background-color:#f5f5f5;">
                                <input type="number" name="dcal" autocomplete="off" placeholder="" style="width: 85%;height: 70%"; required/>
                            </td>
                        </tr>
                        <tr height="60px">
                            <td colspan="4" align="center">
                            <input type="submit" name="" value="儲存" style="width:30%;height: 50%;background-color:#000;border:none;color:#ffffff;"/></td>
                        </tr>    
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="personal_2">
    <?php
        require("DBconnect.php");
        $SQL="SELECT * FROM dietlist";
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
        echo "<h2><b>飲食菜單列表</b></h2>";
        ?>
        <div class="personal_3">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <select name='type'>

        <?php
        $SQL="SELECT * FROM diettype";
        $result=mysqli_query($link,$SQL);
        echo "<option value=''>"."---請選擇---"."</option>";
        while($row=mysqli_fetch_assoc($result)){?>
            <option value="<?php echo $row['dtype']; ?>"><?php echo $row['dtype']; ?></option>
        <?php 
        } 
        ?>
        
        </select>
        <input type='submit' value='搜尋'/>
        </form>
        </div>
        <?php
        if(isset($_POST['type'])==false){
            $type='';
        }else{
            $type=$_POST['type'];
        }
        if($type == ''){
            $SQL="SELECT * FROM dietlist";
            $result=mysqli_query($link,$SQL);
            $data_nums=mysqli_num_rows($result);
            echo "<table width='100%' height='100%'>";
            echo "<tr>";
            echo "<td height='40px' align='center'><h5><b>分類</td><td align='center'><h5><b>食物名稱</td><td align='center'><h5><b>單位</td><td align='center'><h5><b>熱量(大卡)</td><td align='center'><h5><b>共".$data_nums."筆</td></h5>";
            echo "</tr>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td align='center'>".$row["dtype"]."</td><td align='center'>".$row["dname"]."</td><td align='center'>".$row["dunit"]."</td><td align='center'>".$row["dcal"]."</td><td align='center'><a href='d_dconfirm.php?dname=".$row["dname"]."' style='text-decoration:none;color:#000;'><span class='fa fa-trash' style='font-size: 1.2em'></span></a></td>";
                    echo "</tr>";
                }
            echo "</table>";
        }else{
            $SQL="SELECT * FROM dietlist where dtype='$type'";
            $result=mysqli_query($link,$SQL);
            $data_nums=mysqli_num_rows($result);
            echo "<table width='100%' height='100%'>";
            echo "<tr>";
            echo "<td height='40px' align='center'><h5><b>分類</td><td align='center'><h5><b>食物名稱</td><td align='center'><h5><b>單位</td><td align='center'><h5><b>熱量(大卡)</td><td align='center'><h5><b>共".$data_nums."筆</td></h5>";
            echo "</tr>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td align='center'>".$type."</td><td align='center'>".$row["dname"]."</td><td align='center'>".$row["dunit"]."</td><td align='center'>".$row["dcal"]."</td><td align='center'><a href='d_dconfirm.php?dname=".$row["dname"]."' style='text-decoration:none;color:#000;'><span class='fa fa-trash' style='font-size: 1.2em'></span></a></td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
        ?>
    </div>
</div>
</body>
</html>