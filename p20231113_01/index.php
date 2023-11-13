<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>哈哈購物商城 - 首頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="container">
    <h1>哈哈購物商城</h1>
    <header class="nav">
        <div class="nav-item col-4"></div>
        <div class="nav-item col-4">
            <ul class="d-flex justify-content-evenly">
                <li>one</li>
                <li>two</li>
                <li>three</li>
            </ul>
        </div>
        <div class="nav-item col-4">
            <?php
if(isset($_SESSION['user'])){
    echo "welcome!".$_SESSION['user'];
?>
            <a href="member.php" class="btn btn-primary mx-2">會員中心</a>
            <a href="logout.php" class="btn btn-success mx-2">登出</a>
            <?php
                }
else{
?>

            <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
            <a href="login_form.php" class="btn btn-success mx-2">登入</a>
            <?php
        }
        ?>
        </div>
    </header>
</body>

</html>