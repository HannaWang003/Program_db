<?php session_start();?>
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
        <div class="nav-item col-4"></div>
        <div class="nav-item col-4">
            <ul class="d-flex justify-content-evenly">
                <li>1<li>
                <li>2<li>
                <li>3<li>
            </ul>
        </div>
    </header>
    <div class="container m-auto w-75">
        <div class="row">
            <h2 class="text-center col-12">會員中心</h2>
            <div class="col-12 row justify-content-center w-50 m-auto">
                <form action="member_update.php" method="post">
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="acc">帳號</label>
                        <input class="col-3 form-control" type="text" name="acc" id="" value="<?=$_SESSION['user']?>" disabled readonly>
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="pwd">密碼</label>
                        <input class="col-3 form-control" type="password" name="pwd" id="" value="<?=$_SESSION['pwd']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="name">姓名</label>
                        <input class="col-3 form-control" type="text" name="name" id="" value="<?=$_SESSION['name']?>">
                    </div>
                    <div class="container row w-50 m-auto input-group my-2">
                        <label class="col-3 input-group-text" for="tel">電話</label>
                        <input class="col-3 form-control" type="text" name="tel" id="" value="<?=$_SESSION['tel']?>">
                    </div>
                    <div class="container row m-auto justify-content-center">
                        <input class="col-5 mx-3 btn btn-primary" type="submit" value="更新會員資料">
                    </div>
                </form>
                <a class="col-5 mx-3 m-3 text-center" href="./delete.php"><button class="btn btn-light text-secondary">刪除會員資料</button></a>
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