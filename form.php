<?php

session_start();
session_regenerate_id(true);
if (!isset($_SESSION["login"])) {
    print "ログインしていません<br><br>";
    print "<a href='./user_login/user_login_form.html'>ログイン画面へ</a>";
    exit();
} else {
    print $_SESSION["name"] . "さんログイン中";
    print "<br><br>";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
</head>

<body>
    <form action="register.php" method="post">
        <p>機器名</p>
        <input type="text" name="device">
        <p>ipアドレス</p>
        <input type="text" name="ip">
        <p>macアドレス</p>
        <input type="text" name="mac">
        <hr>
        <input type="submit" value="登録">
    </form>
</body>

</html>