<?php
/*
メイン画面
*/

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


//DB接続
require_once("./db/dbc.php");
$dbh = connect(); //関数呼び出し

//デバッグ用
/* print "<pre>";
$d = posix_getpwuid(posix_geteuid());
print_r($d);
print "</pre>";  */
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT管理画面</title>
</head>

<body>
    <h2>登録機器</h2>
    <?php $contents = $dbh->query("SELECT * FROM iotdevice"); ?>
    <?php foreach ($contents as $row) : ?>
        <?php echo "機器名:"  . $row["device"]  . "<br>" . "IPアドレス" . ":" . $row["ip"] . "<br>" . "MACアドレス:" . $row["mac"] . "<br>" . "登録日時:" . $row["time"] . "<br>"; ?>
        <hr>
    <?php endforeach ?>

    <a href="form.html">機器を登録する</a><br>
    <a href="port.php">LAN内のデバイスをスキャンする</a><br>
    <a href="./user_login/user_logout.php">ログアウトする</a>
</body>

</html>