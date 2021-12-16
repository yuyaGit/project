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
<?php


require_once("./db/dbc.php");

$result = $_POST; //formで入力したデータを取得


$sql = "INSERT INTO iotdevice(device,ip,mac) VALUES (:device,:ip,:mac)"; //SQL文を定義

$dbh = connect(); //DB接続

try {
    $stmt = $dbh->prepare($sql); //SQL文をstmt変数に設定
    $stmt->bindValue(":device", $result["device"], PDO::PARAM_STR); //以下でformで受け取ったデータをSQL文にバインド
    $stmt->bindValue(":ip", $result["ip"], PDO::PARAM_STR);
    $stmt->bindValue(":mac", $result["mac"], PDO::PARAM_STR);
    $stmt->execute(); //実行
    echo "機器を登録しました" . "<br>";
} catch (PDOException $e) {
    exit($e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT登録画面</title>
</head>

<body>
    <a href="index.php">管理画面へ移動</a>
</body>

</html>