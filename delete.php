<?php

require_once("./db/dbc.php");
$db = connect();
$ip = $_GET["ip"];

try {
    $stmt = $db->prepare("DELETE FROM iotdevice WHERE ip=:ip");
    $stmt->bindValue(":ip", $ip);
    $stmt->execute();
    echo "デバイスを削除しました<br><br>";
    echo "<a href='index.php'>戻る</a>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
