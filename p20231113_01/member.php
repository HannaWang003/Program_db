<?php 
session_start();
include("./inc/pdo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php
if(isset($_SESSION['user'])){
    ?>
    <header class="nav">
        <div class="nav-item col-4"></div>
        <div class="nav-item col-4">
            <ul class="d-flex justify-content-evenly">
                <li><a class="btn btn-dark" href="./index.php">回首頁</a>
                </li>
                <li>2
                </li>
                <li>3
                </li>
            </ul>
        </div>
    </header>
    <div class="container m-auto w-75">
        <div class="row">
            <h2 class="text-center col-12">會員中心</h2>

            <?php
}
if(isset($_SESSION['msg'])){
    echo "<div class='alert alert-warning text-center col-12 m-auto'>";
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo "</div>";
}
$sql="select * from users where `id`='{$_SESSION['id']}'";
$user=$pdo->query($sql)->fetch();

?>

            <div class="col-12 row justify-content-center w-50 m-auto">
                <form action="member_update.php" method="post">
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="acc">帳號</label>
                        <input class="col-3 form-control" type="text" name="acc" id="" value="<?=$_SESSION['user']?>"
                            disabled readonly>
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="pwd">密碼</label>
                        <input class="col-3 form-control" type="password" name="pwd" id=""
                            value="<?=$user['pwd']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="name">姓名</label>
                        <input class="col-3 form-control" type="text" name="name" id="" value="<?=$user['name']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="tel">電話</label>
                        <input class="col-3 form-control" type="text" name="tel" id="" value="<?=$user['tel']?>">
                    </div>
                    <div class="container row m-auto justify-content-center">
                        <input class="col-5 mx-3 btn btn-primary" type="submit" value="更新會員資料">
                        <input class="col-5 mx-1 btn btn-light" type="reset" value="還原">
                    </div>
                </form>
                <a class="col-5 mx-3 m-3 text-center"><button class="btn btn-light text-secondary"
                        onclick="location.href='delete.php'">刪除會員資料</button></a>
            </div>
        </div> 
    </div>
    <div class="nav-item col-4">
        <?php
        if(isset($_SESSION['user'])){
            echo "歡迎光臨 ".$_SESSION['user'];
            echo "<a href='./api/logout.php' class='btn btn-info mx-2'>登出</a>";
            echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
        }else{
         ?>
        <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
        <a href="login_form.php" class="btn btn-success mx-2">登入</a> 
         <?php
        }
        ?>
        
    </div>
</header>   
<div class="container">
    <h1>使用者資料</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-warning text-center col-6 m-auto'>";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }


        /* $sql="select * from users where `acc`='{$_SESSION['user']}'";
        $user=$pdo->query($sql)->fetch(); */
        $user=find('users',['acc'=>"{$_SESSION['user']}"]);
    ?>
    <form action="./api/update.php" method="post" class="col-4 m-auto">
        <div class="input-group my-1">
            <label class="col-4  input-group-text">帳號:</label>
            <input class="form-control"  type="text" name="acc" id="acc" value="<?=$user['acc'];?>">
        </div>
        <div class="input-group my-1">
            <label class="col-4  input-group-text">密碼:</label>
            <input class="form-control" type="password" name="pw" id="pw" value="<?=$user['pw'];?>">
        </div>
        <div class="input-group my-1">
            <label class="col-4  input-group-text">姓名:</label>
            <input class="form-control" type="text" name="name" id="name" value="<?=$user['name'];?>">
        </div>
        <div class="input-group my-1">
            <label class="col-4  input-group-text">電子郵件:</label>
            <input class="form-control" type="text" name="email" id="email" value="<?=$user['email'];?>">
        </div>
        <div class="input-group my-1">
            <label class="col-4  input-group-text">居住地:</label>
            <input class="form-control" type="text" name="address" id="address" value="<?=$user['address'];?>">
        </div>
        <div>
            <input type="hidden" name="id" id="id" value="<?=$user['id'];?>">
            <input class="btn-primary mx-2" type="submit" value="更新">
            <input class="btn btn-warning mx-2" type="reset" value="重置">
            <input class="btn btn-danger mx-2" type="button" value="讓我消失吧" onclick="location.href='./api/del_user.php?id=<?=$user['id'];?>'">
        </div>    
    </form>
</div>
</body>
</html>