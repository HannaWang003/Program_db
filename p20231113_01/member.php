<?php 
include "./inc/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
if(isset($_SESSION['user'])){
    ?>
    <header class="nav">
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
        <div class="nav-item col-4">
            <?php
            echo "歡迎光臨 ".$_SESSION['user'];
            echo "<a href='./api/logout.php' class='btn btn-info mx-2'>登出</a>";
            echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
            ?>
        </div>
    </header>
    <div class="container m-auto w-75">
        <div class="row">
            <h2 class="text-center col-12">會員中心-使用者資料</h2>
            <?php
if(isset($_SESSION['msg'])){
    echo "<div class='alert alert-warning text-center col-12 m-auto'>";
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo "</div>";
}
$user=find('users',['acc'=>"{$_SESSION['user']}"]);
?>

            <div class="col-12 row justify-content-center w-50 m-auto">
                <form action="./api/member_update.php" method="post">
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="acc">帳號</label>
                        <input class="col-3 form-control" type="text" name="acc" id="" value="<?=$user['acc']?>"
                            disabled readonly>
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="pwd">密碼</label>
                        <input class="col-3 form-control" type="password" name="pwd" id="" value="<?=$user['pwd']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="name">姓名</label>
                        <input class="col-3 form-control" type="text" name="name" id="" value="<?=$user['name']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="tel">電話</label>
                        <input class="col-3 form-control" type="text" name="tel" id="" value="<?=$user['tel']?>">
                    </div>
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <div class="container row m-auto justify-content-center">
                        <input class="col-5 mx-3 btn btn-primary" type="submit" value="更新會員資料">
                        <input class="col-5 mx-1 btn btn-light" type="reset" value="還原">
                    </div>
                </form>
                <a class="col-5 mx-3 m-3 text-center"><button class="btn btn-light text-secondary"
                        onclick="location.href='./api/delete.php?del=<?=$user['id']?>'">刪除會員資料</button></a>
            </div>
        </div>
    </div>
    <?php
}
else{
header("location:index.php");
}
?>
</body>

</html>